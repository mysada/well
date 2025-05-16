# Use an official PHP image as a parent image
# Ensure this PHP version matches your project's requirement (PHP >= 8.2)
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html
# default，could be overwrited by docker-compose build --build-arg APP_ENV=development
ARG APP_ENV=development

# Install system dependencies
RUN apk update && apk add --no-cache \
    build-base \
    curl \
    libzip-dev \
    zip \
    unzip \
    supervisor \
    nginx \
    git \
    # For pacewdd/5bx-client-library or other extensions that might need it
    libxml2-dev \
    # For potential image manipulation if you add GD library later
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    # Node.js and npm for Vite
    nodejs \
    npm

# Install PHP extensions
# Adjust these based on your 'composer.json' and application needs
RUN docker-php-ext-install pdo pdo_mysql zip bcmath exif pcntl opcache

# Install Xdebug for development
RUN if [ "$APP_ENV" != "production" ] ; then \
        pecl install xdebug && docker-php-ext-enable xdebug ; \
    fi

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www/html

# Install project dependencies
RUN touch .env && \
    if [ "$APP_ENV" = "production" ] ; then \
        composer install --optimize-autoloader --no-dev; \
    else \
        composer install --optimize-autoloader; \
    fi

# Install NPM dependencies and build assets
RUN npm install && \
    if [ "$APP_ENV" = "production" ] ; then \
        npm run build; \
    else \
        # For development, you might want 'npm run dev' if your setup supports HMR through Docker
        # Or just 'npm run build' if you rebuild images for dev changes too.
        # Let's assume 'npm run build' is fine for now, or 'npm run dev' if your Vite setup inside Docker is more advanced.
        npm run build; \
    fi

# Set permissions for storage and bootstrap/cache
# The www-data user and group are common for web servers like Nginx/Apache
# Alpine images use 'nginx' or 'www-data' often. PHP-FPM images usually run as www-data by default.
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod g+s /var/www/html/storage

# Expose port 9000 and start php-fpm server
EXPOSE 9000
# CMD ["php-fpm"]
# Using a custom entrypoint/cmd for migrations and supervisord

# --- Nginx Configuration ---
# Copy Nginx configuration file
COPY docker/nginx/default.conf /etc/nginx/http.d/default.conf

# --- Supervisor Configuration ---
# Copy Supervisor configuration file
COPY docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# --- Entrypoint Script ---
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]