# Well Project

## Overview

This is a Laravel-based personal health care website project designed by Mydasa. 
## Team Mydasa
### Team Members
- Manish
  - moneybhangal@gmail.com
- Aman
  - amandawar333@gmail.com
- YongDong
  - paracidex@gmail.com
- Shivangi
  - shivangikoradiya9@gmail.com
- Dongqing
  - dqnican@gmail.com

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

## Fix Conflicts
1. Checkout main branch and pull latest code
2. Checkout your branch
3. Using phpstorm to Merge 'main' into your branch
4. Fixed the conflicts. Do not accept left or right directly
