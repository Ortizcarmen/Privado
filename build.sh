#!/usr/bin/env bash

set -e

composer install --no-dev --optimize-autoloader

# NO compilamos porque ya subimos public/build
# npm ci --no-audit
# npm run build

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force