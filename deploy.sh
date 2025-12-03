#!/bin/bash

# Script de déploiement pour Heroku

# Installer les dépendances
composer install --no-dev --optimize-autoloader

# Générer la clé d'application
php artisan key:generate

# Exécuter les migrations
php artisan migrate --force

# Créer les liens symboliques
php artisan storage:link

echo "Déploiement terminé!"