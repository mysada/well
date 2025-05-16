#--------------------------------------------------------------------------
# Stage 1: PHP Base & Composer Dependencies
#--------------------------------------------------------------------------
FROM php:8.2-fpm-alpine AS php_base

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
# - nginx for serving the application
# - supervisor for process management (nginx + php-fpm)
# - git, zip, unzip for composer
# - common PHP extension dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    git \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    jpeg-dev \
    freetype-dev \
    icu-dev \
    oniguruma-dev # For mbstring

# Install PHP extensions commonly used by Laravel
# Adjust this list based on your application's specific needs
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        gd \
        pdo \
        pdo_mysql \
        zip \
        bcmath \
        opcache \
        intl \
        exif \
        mbstring \
        pcntl # Often used by queue workers

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#--------------------------------------------------------------------------
# Stage 2: Build Frontend Assets (Vite)
#--------------------------------------------------------------------------
FROM node:22-alpine AS frontend_builder

WORKDIR /app

# Copy package.json and lock file

COPY package.json package-lock.json ./

RUN npm ci

# Copy the rest of the frontend application code
COPY vite.config.js .
COPY resources/ resources/
# Add any other files/directories needed for the Vite build (e.g., tailwind.config.js, postcss.config.js)
COPY tailwind.config.js .
COPY postcss.config.js .


RUN npm run build

#--------------------------------------------------------------------------
# Stage 3: Application Build - Final Image
#--------------------------------------------------------------------------
FROM php_base AS app_production

WORKDIR /var/www/html

# Argument for build-time APP_KEY, but it's better to set it at runtime
ARG APP_KEY

# Set environment variables
# APP_ENV is crucial for Laravel to know it's in production
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV DB_CONNECTION=mysql
# Other ENV variables (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD, etc.)
# should be set when running the container, not hardcoded here.
# If APP_KEY is passed during build:
# ENV APP_KEY=${APP_KEY}

# Copy application code from the current directory to the image
# Ensure you have a .dockerignore file to exclude unnecessary files (node_modules, .git, etc.)
COPY --chown=www-data:www-data . .

# Copy built frontend assets from the frontend_builder stage
COPY --from=frontend_builder --chown=www-data:www-data /app/public/build ./public/build

# Install Composer dependencies for production
# --no-dev: Skips development dependencies
# --optimize-autoloader: Optimizes the autoloader
# --no-scripts: Skips any scripts defined in composer.json (run them manually if needed after this)
RUN composer install --no-interaction --no-plugins --no-dev --optimize-autoloader \
    && composer clear-cache

# Set permissions for Laravel storage and cache directories
# www-data is the default user for php-fpm and nginx on Alpine
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Optimize Laravel application
# These commands should ideally be run if APP_KEY is available.
# If APP_KEY is set at runtime, you might run these in an entrypoint script or after deployment.
# For simplicity in this Dockerfile, we assume APP_KEY might be available at build or will be set.
# If APP_KEY is not set during build, config:cache might fail or use a default key.
# Consider running these in an entrypoint script if APP_KEY is strictly runtime.
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache
    # && php artisan event:cache # Uncomment if you use event discovery

# Copy Nginx configuration for Laravel
# You'll need to create this configuration file.
# Example: docker/nginx/default.conf
COPY docker/production/nginx.conf /etc/nginx/http.d/default.conf

# Copy Supervisor configuration
# Example: docker/production/supervisord.conf
COPY docker/production/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose port 80 for Nginx
EXPOSE 80

# Entrypoint script to run migrations and start services
# Create an entrypoint.sh script (see example below)
COPY docker/production/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

# Default command for Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
