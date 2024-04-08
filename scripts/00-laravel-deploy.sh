#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html
composer dump-autoload

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate:fresh

echo "npm running commands"
npm i

npm run build
