#--------------------------------------------------------------------------
# Stage 1: PHP Base & Dependencies
#--------------------------------------------------------------------------
FROM php:8.2-fpm-alpine AS php_base

# 设置工作目录
WORKDIR /var/www/html

# 安装系统依赖
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
    oniguruma-dev \
    bash \
    curl \
    shadow

# 安装 PHP 扩展
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
    pcntl

# 安装 Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


#--------------------------------------------------------------------------
# Stage 2: Build Frontend Assets (Vite)
#--------------------------------------------------------------------------
FROM node:22-alpine AS frontend_builder

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY vite.config.js .
COPY tailwind.config.js .
COPY postcss.config.js .
COPY resources/ resources/
RUN npm run build


#--------------------------------------------------------------------------
# Stage 3: Production Application Image
#--------------------------------------------------------------------------
FROM php_base AS app_production

WORKDIR /var/www/html

# 设置环境变量
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

# 复制项目文件（需使用 .dockerignore 排除无用内容）
COPY --chown=www-data:www-data . .

# 复制构建好的前端资源
COPY --from=frontend_builder --chown=www-data:www-data /app/public/build ./public/build

# 安装生产环境依赖
RUN composer install --no-dev --optimize-autoloader --no-interaction \
 && composer clear-cache

# 权限配置
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# 预缓存配置（如果 APP_KEY 可用）
RUN php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache || true

# 复制 Nginx 配置（确保此文件存在）
COPY docker/production/nginx.conf /etc/nginx/http.d/default.conf

# 复制 Supervisor 配置（确保此文件存在）
COPY docker/production/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# 复制并设置入口脚本
COPY docker/production/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# 公开端口
EXPOSE 80

# 设置入口点与默认命令
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
