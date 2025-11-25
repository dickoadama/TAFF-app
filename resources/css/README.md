# Styles d'embellissement TAFF

Ce document décrit les styles d'embellissement ajoutés pour améliorer l'aspect visuel de l'application TAFF.

## Classes CSS disponibles

### Catégories de services

Les classes suivantes peuvent être appliquées pour styliser différentes catégories de services :

- `.category-btp` - Pour les services BTP (Bâtiment Travaux Publics)
- `.category-maintenance` - Pour les services de maintenance
- `.category-informatique` - Pour les services informatiques
- `.category-camera` - Pour les services de caméras de surveillance
- `.category-logiciel` - Pour les services de logiciels
- `.category-application` - Pour les services d'applications
- `.category-site-internet` - Pour les services de sites internet
- `.category-piratage` - Pour les services de piratage informatique
- `.category-hacking` - Pour les services de hacking éthique

### Cartes avec images de fond

Les classes suivantes peuvent être appliquées pour ajouter des images de fond aux cartes :

- `.card-btp` - Image de fond pour BTP
- `.card-maintenance` - Image de fond pour maintenance
- `.card-informatique` - Image de fond pour informatique
- `.card-camera` - Image de fond pour caméras
- `.card-logiciel` - Image de fond pour logiciels
- `.card-application` - Image de fond pour applications
- `.card-site-internet` - Image de fond pour sites internet
- `.card-piratage` - Image de fond pour piratage
- `.card-hacking` - Image de fond pour hacking

### Fonds de page

Les classes suivantes peuvent être appliquées pour ajouter des fonds de page avec dégradés et images :

- `.bg-btp` - Fond pour BTP
- `.bg-maintenance` - Fond pour maintenance
- `.cellules de fond
- `.bg-informatique` - Fond pour informatique
- `.bg-camera` - Fond pour caméras
- `.bg-logiciel` - Fond pour logiciels
- `.bg-application` - Fond pour applications
- `.bg-site-internet` - Fond pour sites internet
- `.bg-piratage` - Fond pour piratage
- `.bg-hacking` - Fond pour hacking

## Exemple d'utilisation

```html
<!-- Exemple de carte avec style BTP -->
<div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
    <div class="card-btp rounded-lg mb-4"></div>
    <h2 class="text-2xl font-bold mb-2">BTP</h2>
    <p class="mb-4">Services de construction, rénovation et maintenance du bâtiment.</p>
    <a href="#" class="btn-primary inline-block">En savoir plus</a>
</div>

<!-- Exemple de page avec fond BTP -->
<div class="page-background bg-btp">
    <div class="container mx-auto px-4 py-8">
        <!-- Contenu de la page -->
    </div>
</div>
```

## Animations et effets

La classe `.animated-card` ajoute des effets d'animation et de transition aux cartes :
- Effet de survol avec élévation
- Ombres dynamiques
- Transitions fluides

## Personnalisation

Pour personnaliser les styles, modifiez le fichier `embellishment.css` dans ce dossier.