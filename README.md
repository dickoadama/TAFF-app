<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/dickoadama/TAFF-app/actions"><img src="https://github.com/dickoadama/TAFF-app/workflows/CI/CD%20Pipeline/badge.svg" alt="CI/CD Status"></a>
<a href="https://github.com/dickoadama/TAFF-app/actions"><img src="https://github.com/dickoadama/TAFF-app/workflows/CI/CD%20Pipeline/badge.svg?branch=main" alt="Deployment Status"></a>
<a href="https://github.com/dickoadama/TAFF-app/issues"><img src="https://img.shields.io/github/issues/dickoadama/TAFF-app" alt="Issues"></a>
<a href="https://github.com/dickoadama/TAFF-app/pulls"><img src="https://img.shields.io/github/issues-pr/dickoadama/TAFF-app" alt="Pull Requests"></a>
</p>

## TAFF Application

TAFF est une application de gestion complète conçue pour faciliter la connexion entre les artisans et les clients. Cette application permet de gérer les demandes de service, les devis, les factures et les communications entre les parties.

## Fonctionnalités principales

- Gestion des artisans et de leurs réalisations
- Création et suivi des demandes de service
- Génération de devis et de factures
- Système de messagerie entre artisans et clients
- Interface administrateur pour la gestion globale

## Technologies utilisées

- [Laravel 9.x](https://laravel.com) - Framework PHP
- [PostgreSQL](https://www.postgresql.org) - Base de données
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS
- [Vue.js](https://vuejs.org) - Framework JavaScript

## Déploiement

Cette application est automatiquement déployée sur Render à chaque push sur la branche principale grâce à GitHub Actions.

## Configuration requise

- PHP 8.1 ou supérieur
- PostgreSQL 12 ou supérieur
- Composer
- Node.js et NPM

## Installation locale

1. Cloner le dépôt :
   ```bash
   git clone https://github.com/dickoadama/TAFF-app.git
   ```

2. Installer les dépendances PHP :
   ```bash
   composer install
   ```

3. Installer les dépendances JavaScript :
   ```bash
   npm install
   ```

4. Copier le fichier .env :
   ```bash
   cp .env.example .env
   ```

5. Générer la clé d'application :
   ```bash
   php artisan key:generate
   ```

6. Configurer la base de données dans le fichier .env

7. Exécuter les migrations :
   ```bash
   php artisan migrate
   ```

8. Démarrer le serveur de développement :
   ```bash
   php artisan serve
   ```

## Contribution

Les contributions sont les bienvenues ! Veuillez lire le guide de contribution avant de soumettre des modifications.

## Code de conduite

En participant à ce projet, vous acceptez de respecter le code de conduite.

## Sécurité

Si vous découvrez une vulnérabilité de sécurité, veuillez envoyer un e-mail à [dickoadama08@gmail.com](mailto:dickoadama08@gmail.com).

## Licence

Cette application est un logiciel open-source sous licence [MIT](https://opensource.org/licenses/MIT).
