# Base image with PHP 8.2 FPM and Alpine
FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

# Install dependencies and PHP extensions
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
    oniguruma-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd pdo pdo_mysql zip bcmath opcache intl exif mbstring pcntl

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . .

# Configure PHP-FPM to listen on all interfaces
RUN sed -i 's/listen = 127.0.0.1:9000/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf

# Copy nginx configuration
COPY docker/production/nginx.conf /etc/nginx/http.d/default.conf

# Copy supervisor configuration
COPY docker/production/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Set permissions for Laravel storage and cache
RUN chown -R www-data:www-data storage bootstrap/cache && chmod -R 775 storage bootstrap/cache

# Install composer dependencies (production)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Cache Laravel config, routes, views
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Expose HTTP port
EXPOSE 80

# Copy entrypoint script (optional, useful for migrations)
COPY docker/production/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
