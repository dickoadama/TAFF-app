#!/bin/bash

# Script de déploiement pour VPS

# Mettre à jour le système
sudo apt update && sudo apt upgrade -y

# Installer les dépendances
sudo apt install -y php php-cli php-fpm php-json php-common php-mysql php-zip php-gd php-mbstring php-curl php-xml php-pear php-bcmath nginx composer nodejs npm

# Cloner le dépôt
cd /var/www
sudo git clone https://github.com/dickoadama/TAFF-app.git taff
cd taff

# Définir les permissions
sudo chown -R www-data:www-data /var/www/taff
sudo chmod -R 755 /var/www/taff

# Installer les dépendances PHP
sudo -u www-data composer install --no-dev --optimize-autoloader

# Installer les dépendances Node.js
npm install
npm run build

# Copier le fichier d'environnement
cp .env.example .env

# Générer la clé d'application
sudo -u www-data php artisan key:generate

# Exécuter les migrations
sudo -u www-data php artisan migrate --force

# Créer les liens symboliques
sudo -u www-data php artisan storage:link

# Configurer Nginx
sudo cp nginx.conf /etc/nginx/sites-available/taff
sudo ln -s /etc/nginx/sites-available/taff /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx

# Redémarrer PHP-FPM
sudo systemctl restart php8.0-fpm

echo "Déploiement sur VPS terminé!"