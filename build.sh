#!/bin/bash

# Installer les dépendances PHP
composer install --optimize-autoloader --no-dev

# Générer la clé d'application si elle n'existe pas
if [ -z "$APP_KEY" ]; then
  echo "Generating application key..."
  php artisan key:generate --force
fi

# Exécuter les migrations
echo "Running migrations..."
php artisan migrate --force

# Optimiser l'application
echo "Optimizing application..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Build completed successfully!"