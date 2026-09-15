# ==========================================
# Stage 1: Build Frontend Assets
# ==========================================
FROM node:22-alpine AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# ==========================================
# Stage 2: Production PHP Runtime
# ==========================================
FROM dunglas/frankenphp:php8.4-alpine AS production

# Install PHP extensions required by Laravel
RUN install-php-extensions \
    pdo_sqlite \
    pdo_mysql \
    intl \
    gd \
    zip \
    bcmath \
    opcache

WORKDIR /app

# Copy application files
COPY . /app

# Copy built frontend assets from Stage 1
COPY --from=frontend /app/public/build /app/public/build

# Install production PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Configure Caddy / FrankenPHP
COPY docker/Caddyfile /etc/caddy/Caddyfile
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENV SERVER_NAME=":8080"
EXPOSE 8080

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
