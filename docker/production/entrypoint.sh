#!/bin/sh
set -e

# 0. 初始等待（默认10秒，可通过环境变量 INITIAL_WAIT 调整）
INITIAL_WAIT="${INITIAL_WAIT:-10}"
echo "🕐 Initial wait for ${INITIAL_WAIT}s to allow database container startup..."
sleep "$INITIAL_WAIT"

# 1. 检查 APP_KEY 是否存在于 .env 中
if ! grep -q '^APP_KEY=' .env || grep -q '^APP_KEY=$' .env; then
    echo "🔑 APP_KEY not set in .env. Generating..."
    php artisan key:generate --force
else
    echo "✅ APP_KEY already set."
fi

# 2. 等待数据库端口开放（带超时）
echo "⏳ Waiting for database at ${DB_HOST}:${DB_PORT}..."
timeout=60
elapsed=0
while ! nc -z "${DB_HOST}" "${DB_PORT}" 2>/dev/null; do
  if [ "$elapsed" -ge "$timeout" ]; then
    echo "❌ Timeout waiting for database at ${DB_HOST}:${DB_PORT}"
    exit 1
  fi
  echo "🔄 Still waiting for database..."
  sleep 1
  elapsed=$((elapsed + 1))
done
echo "✅ Database is up!"

# 3. 运行迁移
echo "🛠️ Running migrations..."
php artisan migrate --force

# 4. 检查是否需要 seed（使用你自定义的命令）
echo "🔍 Checking if database needs seeding..."
if php artisan check:seed; then
  echo "🌱 Seeding database..."
  php artisan db:seed --force
else
  echo "✅ Seed not needed."
fi

# 5. 建立 storage 链接
echo "🔗 Running storage:link..."
php artisan storage:link --force

# 6. 执行主进程
echo "🚀 Starting main process: $@"
exec "$@"
