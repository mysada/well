#!/bin/sh
set -e

if [ -z "${APP_KEY}" ]; then
    echo "Warning: APP_KEY is not set. Generating a new one."
    php artisan key:generate --force
else
    echo "APP_KEY is set."
fi

# 等待数据库启动
echo "Waiting for database at $DB_HOST:$DB_PORT..."
while ! nc -z $DB_HOST $DB_PORT; do
  sleep 1
done
echo "Database is up!"

echo "Running database migrations..."
php artisan migrate --force

# 检查 users 表数据量
count=$(mysql -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USERNAME" -p"$DB_PASSWORD" -D"$DB_DATABASE" -N -s -e "SELECT COUNT(*) FROM users;")

if [ "$count" -eq 0 ]; then
  echo "Database empty, running seeders..."
  php artisan db:seed --force
else
  echo "Database already has data, skipping seeders."
fi

echo "Running Storage Link"
php artisan storage:link

echo "Starting supervisord..."
exec "$@"
