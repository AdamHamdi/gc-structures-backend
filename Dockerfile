# Stage 1 — Build des assets Vite (Node)
FROM node:20-alpine AS node-builder
WORKDIR /app
COPY package.json ./
RUN npm install
COPY resources/ resources/
COPY vite.config.js ./
RUN npm run build

# Stage 2 — Image PHP de production
FROM php:8.2-fpm-alpine AS runner

# Extensions PHP nécessaires pour Laravel
RUN apk add --no-cache \
        nginx \
        supervisor \
        libpng-dev \
        libjpeg-turbo-dev \
        libwebp-dev \
        freetype-dev \
        libzip-dev \
        icu-dev \
        oniguruma-dev \
        openssl-dev \
        autoconf \
        g++ \
        make \
    && docker-php-ext-configure gd \
        --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        intl \
        opcache \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && apk del autoconf g++ make

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Code source complet
COPY . .

# Dépendances PHP + package MongoDB
RUN composer require mongodb/laravel-mongodb --no-interaction --no-progress \
    && composer install \
        --no-dev \
        --optimize-autoloader \
        --no-interaction \
        --no-progress

# Assets Vite compilés
COPY --from=node-builder /app/public/build ./public/build

# Créer le dossier de logs supervisor
RUN mkdir -p /var/log/supervisor

# Permissions storage et cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Config Nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Config Supervisor (Nginx + PHP-FPM)
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Entrypoint (génère APP_KEY, migrations, cache)
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 8000

ENTRYPOINT ["/entrypoint.sh"]
