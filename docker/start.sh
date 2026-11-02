
#!/bin/bash

set -e

cd /var/www/html

echo "Preparing Laravel..."

php artisan config:clear
php artisan route:clear
php artisan view:clear

php artisan config:cache

echo "Starting PHP-FPM..."

php-fpm -D

echo "Starting Nginx..."

nginx -g "daemon off;"
