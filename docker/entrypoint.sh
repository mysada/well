#!/bin/sh
set -e

# Wait for the database to be ready (optional, if DB is also Dockerized and starts slower)
# echo "Waiting for database..."
# while ! nc -z ${DB_HOST} ${DB_PORT}; do
#   sleep 1
# done
# echo "Database is up!"

# Copy .env if it doesn't exist, but prefer environment variables from docker-compose
# if [ ! -f ".env" ]; then
#    echo "Creating .env file from .env.example"
#    cp .env.example .env
# fi

# Run Laravel optimizations
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache # For Laravel 11+

# Run database migrations
php artisan migrate --force # '--force' is recommended for running in scripts

# Set storage permissions (redundant if already done in Dockerfile, but good for safety)
# chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
# chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "Laravel application ready."

# Execute the CMD from the Dockerfile (supervisord)
exec "$@"