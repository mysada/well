#!/bin/sh
set -e

if [ -z "${APP_KEY}" ]; then
    echo "Warning: APP_KEY is not set. Generating a new one."
    php artisan key:generate --force
else
    echo "APP_KEY is set."
fi

echo "Waiting for database at $DB_HOST:$DB_PORT..."
while ! nc -z $DB_HOST $DB_PORT; do
  sleep 1
done
echo "Database is up!"

echo "Running migrations..."
php artisan migrate --force

# Check if the 'users' table has any records
count=$(php artisan tinker --execute="echo \DB::table('users')->count();")

if [ "$count" = "0" ]; then
  echo "Database is empty, running seeders..."
  php artisan db:seed --force
else
  echo "Database already has data, skipping seeders."
fi

echo "Running storage:link..."
php artisan storage:link

exec "$@"
