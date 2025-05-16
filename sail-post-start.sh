#!/bin/bash

# 启动容器
./vendor/bin/sail up -d

# 等待几秒确保容器准备就绪
sleep 5

# 执行 storage:link
./vendor/bin/sail artisan storage:link

echo "Link the Storage"
