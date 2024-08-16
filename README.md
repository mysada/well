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
  

### Login Details

## Regular User
* well.mydasa@gmail.com
* Mydasa@123

## Admin 
* well.yongdong@gmail.com
* Mydasa@123


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

## Technology Stack
### Front-End

#### Build Tools
- **`vite`**: `^5.3.5`
- **`glob`**: `^11.0.0`
- **`laravel-vite-plugin`**: `^1.0.5`

#### CSS Preprocessing and Tools
- **`sass`**: `^1.77.8`
- **`postcss`**: `^8.4.41`
- **`autoprefixer`**: `^10.4.20`

#### CSS Frameworks
- **`bootstrap`**: `^5.3.3`
- **`daisyui`**: `^4.12.10`
- **`tailwindcss`**: `^3.4.9`

#### JavaScript Libraries
- **`axios`**: `^1.6.4`
- **`jquery`**: `^3.7.1`
- **`slick-carousel`**: `^1.8.1`

#### Utilities
- **`@popperjs/core`**: `^2.11.8`

### Back-End
- **Laravel**: `^11.9`
- **PHP**: `^8.2`
- **PHPUnit**: `^11.0.1`
- **Laravel UI**: `^4.5`
- **pacewdd/5bx-client-library**: `^1.0`

### Server
- **Operating System**: Ubuntu 24.04 LTS
- **Apache**: `2.4.58 (Ubuntu)`
- **MySQL**: `8.0.39-0ubuntu0.24.04.1`
- **Certbot**: `2.9.0`
