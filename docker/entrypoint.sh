#!/bin/sh
set -e

cd /var/www

# Générer APP_KEY si absent
if [ -z "$APP_KEY" ]; then
  export APP_KEY=$(php artisan key:generate --show --no-ansi)
fi

# Vider les caches compilés (config peut changer selon l'env)
php artisan config:clear
php artisan cache:clear

# Migrations
php artisan migrate --force --no-interaction

# Recacher pour la production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Lancer supervisor (Nginx + PHP-FPM)
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
