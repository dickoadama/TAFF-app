# Ce script génère une version statique de l'application Laravel
# pour le déploiement sur GitHub Pages

Write-Host "Génération de la version statique..."

# Créer le répertoire pour les fichiers statiques
New-Item -ItemType Directory -Force -Path docs

# Copier les fichiers statiques de base (si le dossier public existe)
if (Test-Path "public") {
    Copy-Item -Path "public\*" -Destination "docs" -Recurse -Force
}

# Créer une page d'index simple
$indexContent = @"
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAFF - Application de Gestion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        p {
            font-size: 1.2em;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: #fff;
            color: #667eea;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }
        .features {
            text-align: left;
            margin: 30px 0;
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 8px;
        }
        .feature {
            margin: 15px 0;
            display: flex;
            align-items: center;
        }
        .feature:before {
            content: "✓";
            margin-right: 10px;
            color: #4CAF50;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 TAFF - Application de Gestion</h1>
        <p>Une solution complète pour connecter les artisans avec leurs clients</p>
        
        <div class="features">
            <div class="feature">Gestion des artisans et de leurs réalisations</div>
            <div class="feature">Création et suivi des demandes de service</div>
            <div class="feature">Génération de devis et de factures</div>
            <div class="feature">Système de messagerie intégré</div>
            <div class="feature">Interface administrateur complète</div>
        </div>
        
        <p>Pour accéder à l'application complète, veuillez la déployer sur un service d'hébergement adapté comme Render ou Heroku.</p>
        
        <a href="https://github.com/dickoadama/TAFF-app" class="btn">Voir le code source sur GitHub</a>
    </div>
</body>
</html>
"@

Set-Content -Path "docs/index.html" -Value $indexContent

# Créer un fichier README pour GitHub Pages
$readmeContent = @"
# TAFF - Application de Gestion

Cette page présente le projet TAFF, une application de gestion complète pour connecter les artisans avec leurs clients.

## Fonctionnalités

- Gestion des artisans et de leurs réalisations
- Création et suivi des demandes de service
- Génération de devis et de factures
- Système de messagerie intégré
- Interface administrateur complète

## Déploiement

Pour déployer l'application complète, veuillez consulter le dépôt principal et suivre les instructions de déploiement sur Render ou Heroku.

## Technologies utilisées

- Laravel 9.x
- PostgreSQL
- Tailwind CSS
- Vue.js
"@

Set-Content -Path "docs/README.md" -Value $readmeContent

Write-Host "Version statique générée avec succès dans le dossier 'docs/'"
Write-Host "Vous pouvez maintenant activer GitHub Pages dans les paramètres de votre dépôt"