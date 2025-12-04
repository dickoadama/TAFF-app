#!/bin/bash

# Générer la clé d'application
php artisan key:generate

# Exécuter les migrations
php artisan migrate --force

# Exécuter les seeders si nécessaire
php artisan db:seed --force

echo "Déploiement terminé avec succès!"