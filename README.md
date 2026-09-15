# Pillo Hotel Management System (Pillo Kaliana)

[![Laravel](https://img.shields.io/badge/Laravel-13.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3%20%7C%208.4%20%7C%208.5-blue.svg)](https://php.net)
[![Vite](https://img.shields.io/badge/Vite-8.x-purple.svg)](https://vitejs.dev)
[![Tailwind CSS](https://img.shields.io/badge/TailwindCSS-4.x-38bdf8.svg)](https://tailwindcss.com)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

A web-based Hotel Property Management System (PMS) built with Laravel 13, Vite 8, and Tailwind CSS 4. The application streamlines front-office operations, room inventory management, guest registrations, room reservations, facility tracking, and staff records.

---

## Table of Contents
- [Architecture & Tech Stack](#architecture--tech-stack)
- [Application Modules](#application-modules)
- [Server Prerequisites](#server-prerequisites)
- [Local Development Setup](#local-development-setup)
- [Production Server Deployment Guide](#production-server-deployment-guide)
  - [1. Server Provisioning & Dependencies](#1-server-provisioning--dependencies)
  - [2. Clone & Dependency Installation](#2-clone--dependency-installation)
  - [3. Environment & Database Configuration](#3-environment--database-configuration)
  - [4. Storage Symlink & File Permissions](#4-storage-symlink--file-permissions)
  - [5. Production Asset Compilation & Caching](#5-production-asset-compilation--caching)
  - [6. Nginx Web Server Configuration](#6-nginx-web-server-configuration)
  - [7. SSL / HTTPS Setup (Certbot)](#7-ssl--https-setup-certbot)
  - [8. Process Management & Queue Worker (Supervisor)](#8-process-management--queue-worker-supervisor)
  - [9. Scheduled Tasks (Cron)](#9-scheduled-tasks-cron)
- [Critical Pre-Deployment Checklist (Known Flaws & Fixes)](#critical-pre-deployment-checklist-known-flaws--fixes)
- [Operational Commands](#operational-commands)
- [Security & Hardening](#security--hardening)

---

## Architecture & Tech Stack

- **Backend Framework**: [Laravel 13.x](https://laravel.com) (PHP 8.3 / 8.4 / 8.5)
- **Frontend Tooling**: [Vite 8.x](https://vitejs.dev) with `@tailwindcss/vite`
- **UI & Styling**: [Tailwind CSS 4.x](https://tailwindcss.com), [Alpine.js 3.x](https://alpinejs.dev)
- **Database Support**: MySQL 8.0+ / MariaDB 10.6+ (Production), SQLite (Testing/Development)
- **Asset Bundling**: Native ECMAScript modules with lightningcss post-processing

---

## Application Modules

| Module | Route Prefix | Description |
| :--- | :--- | :--- |
| **Dashboard** | `/app/dashboard` | Real-time occupancy metrics, available/occupied room counters, confirmed vs pending bookings, latest reservations overview. |
| **Guest Management** | `/app/guest` | Guest profile records, phone contacts, national identity card registration with scanned ID photo uploads. |
| **Room Categories** | `/app/room_category` | Room classes (Deluxe, Suite, Standard), room dimension, bed setups (Single/Double), base pricing, and maximum occupancy limits. |
| **Rooms Inventory** | `/app/room` | Room numbers/names, status tracking (`Available`, `Occupied`, `Maintenance`, `Reserved`), and assigned room categories. |
| **Hotel Facilities** | `/app/facility` | Inventory of room amenities and public facilities, consumable flags, and stock tracking. |
| **Category Facilities** | `/app/room_category_facility`| Pivot allocation of amenities (e.g. towels, mini-fridge, kettle) and item quantities to specific room categories. |
| **Reservations** | `/app/reservation` | Master booking documents, auto-generated alphanumeric booking codes, guest linking, status tracking, and promotional vouchers. |
| **Room Reservations** | `/app/roomreservation` | Multi-room sub-bookings per reservation, check-in/check-out dates, nights calculation, guest headcounts (adults, children, infants), and dynamic room rates. |
| **Staff & Employees** | `/app/employee` | Internal staff registry with assigned credentials, gender, and contact details. |

---

## Server Prerequisites

- **OS**: Ubuntu 22.04 LTS or 24.04 LTS (recommended) / Debian 12
- **Web Server**: Nginx (preferred) or Apache 2.4+
- **PHP**: PHP 8.3 or higher (PHP 8.5 supported)
- **Required PHP Extensions**:
  `php-cli`, `php-fpm`, `php-mysql` (or `php-sqlite3`), `php-mbstring`, `php-xml`, `php-curl`, `php-zip`, `php-bcmath`, `php-gd`, `php-intl`
- **Database**: MySQL 8.0+ / MariaDB 10.6+
- **Node.js**: Node.js 20.x or 22.x LTS with NPM
- **Composer**: Composer 2.x

---

## Local Development Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/asabrightzzz/pillo_hotel2.git
   cd pillo_hotel2
   ```

2. **Install PHP and Node dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Configure the environment file:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run migrations:**
   ```bash
   php artisan migrate
   ```

5. **Link storage:**
   ```bash
   php artisan storage:link
   ```

6. **Start local servers:**
   ```bash
   # Terminal 1: Run Vite dev server
   npm run dev

   # Terminal 2: Run Laravel backend
   php artisan serve
   ```

---

## Production Server Deployment Guide

### 1. Server Provisioning & Dependencies

On your Ubuntu/Debian server, update packages and install Nginx, PHP, MySQL, and Node.js:

```bash
# Update repository index
sudo apt update && sudo apt upgrade -y

# Install Nginx, Git, Unzip, Supervisor, and Curl
sudo apt install -y nginx git unzip curl supervisor

# Add ondrej/php PPA for modern PHP versions (if on Ubuntu)
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update

# Install PHP 8.3 (or PHP 8.4/8.5) and essential extensions
sudo apt install -y php8.3-fpm php8.3-cli php8.3-mysql php8.3-mbstring \
                    php8.3-xml php8.3-curl php8.3-zip php8.3-bcmath \
                    php8.3-gd php8.3-intl php8.3-sqlite3

# Install Composer globally
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Node.js LTS (Node 22)
curl -fsSL https://deb.nodesource.com/setup_22.x | sudo -E bash -
sudo apt install -y nodejs
```

---

### 2. Clone & Dependency Installation

Deploy code into `/var/www/pillo_hotel`:

```bash
# Create directory and set permissions
sudo mkdir -p /var/www/pillo_hotel
sudo chown -R $USER:$USER /var/www/pillo_hotel

# Clone codebase
git clone https://github.com/asabrightzzz/pillo_hotel2.git /var/www/pillo_hotel
cd /var/www/pillo_hotel

# Install production PHP dependencies without dev packages
composer install --no-dev --optimize-autoloader

# Install NPM packages and build assets
npm ci
npm run build
```

---

### 3. Environment & Database Configuration

1. **Create the production environment file:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

2. **Configure production database in `.env`:**
   ```env
   APP_NAME="Pillo Hotel"
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://yourhoteldomain.com

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=pillo_hotel_db
   DB_USERNAME=pillo_user
   DB_PASSWORD=YourStrongPasswordHere

   SESSION_DRIVER=database
   QUEUE_CONNECTION=database
   CACHE_STORE=database
   ```

3. **Create MySQL database and user:**
   ```sql
   CREATE DATABASE pillo_hotel_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   CREATE USER 'pillo_user'@'127.0.0.1' IDENTIFIED BY 'YourStrongPasswordHere';
   GRANT ALL PRIVILEGES ON pillo_hotel_db.* TO 'pillo_user'@'127.0.0.1';
   FLUSH PRIVILEGES;
   ```

4. **Run migrations:**
   ```bash
   php artisan migrate --force
   ```

---

### 4. Storage Symlink & File Permissions

Set proper ownership to `www-data` (the web server user) and ensure `storage` and `bootstrap/cache` are writable:

```bash
# Create the storage symlink for uploaded guest ID photos
php artisan storage:link

# Assign correct ownership and permissions
sudo chown -R www-data:www-data /var/www/pillo_hotel
sudo chmod -R 775 /var/www/pillo_hotel/storage
sudo chmod -R 775 /var/www/pillo_hotel/bootstrap/cache
```

---

### 5. Production Asset Compilation & Caching

Run Laravel's production caching commands to maximize performance:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

---

### 6. Nginx Web Server Configuration

Create a new Nginx virtual host configuration:

```bash
sudo nano /etc/nginx/sites-available/pillo_hotel
```

Paste the following configuration:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name yourhoteldomain.com www.yourhoteldomain.com;
    root /var/www/pillo_hotel/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    add_header X-XSS-Protection "1; mode=block";

    index index.php;
    charset utf-8;

    # Maximum file upload size (needed for identity photo uploads)
    client_max_body_size 10M;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock; # Adjust PHP version if using 8.4/8.5
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Enable the site and reload Nginx:

```bash
sudo ln -s /etc/nginx/sites-available/pillo_hotel /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

---

### 7. SSL / HTTPS Setup (Certbot)

Secure your domain with free Let's Encrypt SSL certificates:

```bash
sudo apt install -y certbot python3-certbot-nginx
sudo certbot --nginx -d yourhoteldomain.com -d www.yourhoteldomain.com
```

Certbot will automatically configure HTTPS redirects in Nginx and renew certificates via cron.

---

### 8. Process Management & Queue Worker (Supervisor)

For asynchronous processing and background queues:

Create a Supervisor worker file:
```bash
sudo nano /etc/supervisor/conf.d/pillo-worker.conf
```

Configuration:
```ini
[program:pillo-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/pillo_hotel/artisan queue:work database --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=2
redirect_stderr=true
stdout_logfile=/var/www/pillo_hotel/storage/logs/worker.log
stopwaitsecs=3600
```

Start Supervisor:
```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start pillo-worker:*
```

---

### 9. Scheduled Tasks (Cron)

Set up Laravel's task scheduler to run every minute:

```bash
sudo crontab -u www-data -e
```

Add the following entry:
```cron
* * * * * cd /var/www/pillo_hotel && php artisan schedule:run >> /dev/null 2>&1
```

---

## Critical Pre-Deployment Checklist (Known Flaws & Fixes)

Before releasing to a production server, address these critical flaws identified during system analysis:

| Priority | Category | Issue | Recommended Fix |
| :---: | :--- | :--- | :--- |
| 🚨 **CRITICAL** | **Security** | **Unprotected Routes**: `/app/*` routes have no `auth` middleware. Anyone can view/edit hotel data without login. | Wrap `/app` route group in `middleware(['auth'])`. |
| 🚨 **CRITICAL** | **Security** | **Plaintext Passwords**: `EmployeeController@store` saves passwords without hashing. | Use `Hash::make($request->password)` or Eloquent `hashed` cast. |
| 🚨 **CRITICAL** | **Linux / OS** | **PSR-4 Filename Mismatch**: Models `room.php`, `dashboard.php`, and `room_category_facility.php` are lowercase/snake_case. | Rename to `Room.php`, `Dashboard.php`, `RoomCategoryFacility.php` to prevent fatal autoloader crashes on Linux. |
| 🚨 **CRITICAL** | **Database** | **MySQL Out of Range Error**: `reservations.code` is defined as `integer`. Auto-code `3`+`ymd`+`seq` exceeds 32-bit int limit (`2,147,483,647`). | Change column type from `integer` to `string` in migration. |
| ⚠️ **HIGH** | **Runtime** | **Debug Dump in Production**: `dd($room_reservation)` left inside `RoomReservationController@destroy`. | Remove `dd(...)` statement. |
| ⚠️ **HIGH** | **Routing** | **Hardcoded Localhost URL**: `routes/web.php` redirects `/` to `http://127.0.0.1:8082`. | Change redirect to `route('app.dashboard.index')` or landing page. |
| ⚠️ **HIGH** | **Security** | **Unvalidated Mass Assignment**: Multiple controllers execute `create($request->all())`. | Implement Form Requests or `$request->validate([...])` on all endpoints. |
| ⚠️ **HIGH** | **Migration** | **Broken Rollback**: `create_employee_table` down method drops `reservation_rooms` instead of `employees`. | Change `Schema::dropIfExists('reservation_rooms')` to `'employees'`. |

---

## Operational Commands

```bash
# Clear application cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Rebuild optimization cache for production
php artisan optimize

# Run database migrations
php artisan migrate --force

# Check registered routes
php artisan route:list

# View queue status
sudo supervisorctl status

# View application logs
tail -f storage/logs/laravel.log
```

---

## Security & Hardening

1. **Turn off Debug Mode**: Always set `APP_DEBUG=false` in production `.env`.
2. **Restrict Access to `.env`**: Nginx configuration blocks requests to hidden dotfiles (`/\.(?!well-known).*`).
3. **Database Privileges**: Avoid using MySQL `root` user. Create a dedicated user with privileges limited to the application database.
4. **Regular Updates**: Keep Composer and NPM dependencies audited and updated.
5. **Firewall**: Enable UFW and only open ports `22` (SSH), `80` (HTTP), and `443` (HTTPS):
   ```bash
   sudo ufw allow OpenSSH
   sudo ufw allow 'Nginx Full'
   sudo ufw enable
   ```

---

## License

This project is licensed under the [MIT License](LICENSE).
