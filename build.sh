#!/usr/bin/env bash

set -e

composer install --no-dev --optimize-autoloader

# IMPORTANTE: Instalar dependencias y compilar assets
npm ci --no-audit
npm run build

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force


