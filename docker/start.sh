#!/usr/bin/env bash

set -e

role=${CONTAINER_ROLE:-app}
env=${APP_ENV:-production}

# Perform caching or clear them up depending on the environment
if [ "$env" != "local" ]; then
    echo "Running in \"$env\". Building app caches..."
    (cd /app && php artisan config:cache && php artisan route:cache)
else
    echo "Running in \"$env\". Clearing cache (for development purpose)..."
    (cd /app && php artisan config:clear && php artisan route:clear)
fi

# Run as specified by the role
if [ "$role" = "app" ]; then
    echo "Running as main app"
    exec apache2-foreground
elif [ "$role" = "queue" ]; then
    echo "Running as queue runner"
    php /app/artisan queue:work --verbose --tries=3 --timeout=90
else
    echo "Invalid role \"$role\""
    exit 1
fi
