#!/bin/sh
set -e

# 1. 如果没设置 APP_KEY，就生成一个
if [ -z "${APP_KEY}" ]; then
    echo "Warning: APP_KEY is not set. Generating a new one."
    php artisan key:generate --force
else
    echo "APP_KEY is set."
fi

php artisan cache:clear

# 2. 等待数据库启动
echo "Waiting for database at ${DB_HOST}:${DB_PORT}..."

# 这里用循环加超时，防止无限等待（最多等待60秒）
timeout=60
elapsed=0

while ! nc -z "${DB_HOST}" "${DB_PORT}" 2>/dev/null; do
  if [ "$elapsed" -ge "$timeout" ]; then
    echo "Timeout waiting for database at ${DB_HOST}:${DB_PORT}"
    exit 1
  fi
  echo "Database is not up yet, waiting..."
  sleep 1
  elapsed=$((elapsed + 1))
done

echo "Database is up!"

# 3. 运行迁移和种子
echo "Running migrations..."
php artisan migrate --force

# 用 php artisan tinker 不太方便判断，改用纯 PHP 方式
count=$(php -r "require 'vendor/autoload.php'; require 'bootstrap/app.php'; echo \\DB::table('users')->count();")

if [ "$count" = "0" ]; then
  echo "Database is empty, running seeders..."
  php artisan db:seed --force
else
  echo "Database already has data, skipping seeders."
fi

# 4. 建立 storage 符号链接
echo "Running storage:link..."
php artisan storage:link --force

# 5. 执行主进程（supervisord 或者其它）
exec "$@"
