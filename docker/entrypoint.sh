#!/bin/sh
set -e

# Ensure SQLite database exists if using sqlite
if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
    mkdir -p /app/database
    if [ ! -f /app/database/database.sqlite ]; then
        touch /app/database/database.sqlite
    fi
    chown -R www-data:www-data /app/database
fi

# Ensure storage directories exist and have correct permissions
mkdir -p /app/storage/framework/sessions \
         /app/storage/framework/views \
         /app/storage/framework/cache \
         /app/storage/logs \
         /app/storage/app/public \
         /app/bootstrap/cache

chown -R www-data:www-data /app/storage /app/bootstrap/cache
chmod -R 775 /app/storage /app/bootstrap/cache

# Run database migrations
php artisan migrate --force

# Create public storage symlink
php artisan storage:link --force

# Optimize application cache for production
php artisan optimize

echo "Pillo Hotel started successfully!"

# Execute main process
exec "$@"
