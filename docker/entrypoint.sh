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

# Auto-create PostgreSQL database if it does not exist
if [ "${DB_CONNECTION}" = "pgsql" ]; then
    php -r '
    $host = getenv("DB_HOST") ?: "127.0.0.1";
    $port = getenv("DB_PORT") ?: 5432;
    $user = getenv("DB_USERNAME") ?: "casaos";
    $pass = getenv("DB_PASSWORD") ?: "casaos";
    $name = getenv("DB_DATABASE") ?: "pillo_hotel";
    try {
        $pdo = new PDO("pgsql:host=$host;port=$port;dbname=postgres", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $check = $pdo->prepare("SELECT 1 FROM pg_database WHERE datname = :name");
        $check->execute([":name" => $name]);
        if (!$check->fetch()) {
            $pdo->exec("CREATE DATABASE \"$name\"");
            echo "PostgreSQL database \"$name\" created successfully.\n";
        }
    } catch (Exception $e) {
        echo "PostgreSQL check notice: " . $e->getMessage() . "\n";
    }
    '
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
