# Mydasa Project

## Overview

This is a Laravel-based personal health care website project designed by Mydasa. 
### Mydasa Members

- Manish
- Aman
- YongDong
- Shivangi
- Dongqing

### Server
- https://team2.uwpace.ca/

## Requirements

- PHP >= 8.0
- Composer
- Laravel >= 8.x

## Run Locally
1. Copy `.env.example` to `.env` and setup   

2. Run following code to generate an App key,  create tables and import data

   ```bash	
   php artisan key:generate
   php artisan migrate:refresh
   php artisan config:cache
   ```

3. Start laravel server

   ```bash
   php artisan serve
   ```

4. Start Vite

   ```bash
   npm run dev
   ```

## Deployment

```bash
sudo chown -R www-data:www-data storage
sudo chmod -R 775 storage
sudo chmod g+s storage
```

