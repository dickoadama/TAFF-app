@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="video-gallery-header text-center mb-12">
        <h1 class="text-4xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Galerie Vidéo
        </h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Découvrez nos inspirations et réalisations à travers notre collection de vidéos
        </p>
    </div>

    <div class="video-gallery-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
        <!-- Vidéo 1: Maison contemporaine -->
        <div class="video-card">
            <div class="video-feature-section">
                <div class="video-feature-wrapper">
                    <div class="video-display-container">
                        <div class="video-aspect-ratio">
                            <video controls preload="metadata" poster="{{ asset('images/placeholders/btp.jpg') }}">
                                <source src="{{ asset('images/videos/Maison contemporaine _ 15 modèles pour s\'inspirer.mp4') }}" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture de vidéos.
                            </video>
                            <div class="video-overlay"></div>
                            <div class="video-play-overlay">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="video-content-section">
                        <div class="video-tag">
                            <i class="fas fa-star"></i>
                            En vedette
                        </div>
                        <h3 class="video-main-title">Maison contemporaine</h3>
                        <h4 class="video-sub-title">15 modèles pour s'inspirer</h4>
                        <p class="video-description">
                            Découvrez 15 modèles de maisons contemporaines qui pourraient vous inspirer pour votre prochain projet de construction ou de rénovation.
                        </p>
                        <div class="video-action-buttons">
                            <button class="video-btn video-btn-primary play-video-btn" data-video="maison-contemporaine">
                                <i class="fas fa-play-circle"></i>Lire la vidéo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vidéo 2: Maison à étage -->
        <div class="video-card">
            <div class="video-feature-section">
                <div class="video-feature-wrapper">
                    <div class="video-display-container">
                        <div class="video-aspect-ratio">
                            <video controls preload="metadata" poster="{{ asset('images/placeholders/construction_renovation.jpg') }}">
                                <source src="{{ asset('images/videos/Maison contemporaine à étage 205m2 - Groupe BLAIN CONSTRUCTION #construction #maison.mp4') }}" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture de vidéos.
                            </video>
                            <div class="video-overlay"></div>
                            <div class="video-play-overlay">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="video-content-section">
                        <div class="video-tag">
                            <i class="fas fa-home"></i>
                            Construction
                        </div>
                        <h3 class="video-main-title">Maison à étage</h3>
                        <h4 class="video-sub-title">205m² de prestige</h4>
                        <p class="video-description">
                            Explorez cette réalisation exceptionnelle de maison à étage de 205m² conçue par le Groupe BLAIN CONSTRUCTION.
                        </p>
                        <div class="video-action-buttons">
                            <button class="video-btn video-btn-primary play-video-btn" data-video="maison-etage">
                                <i class="fas fa-play-circle"></i>Lire la vidéo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vidéo 3: Effet tendance -->
        <div class="video-card">
            <div class="video-feature-section">
                <div class="video-feature-wrapper">
                    <div class="video-display-container">
                        <div class="video-aspect-ratio">
                            <video controls preload="metadata" poster="{{ asset('images/placeholders/maintenance.jpg') }}">
                                <source src="{{ asset('images/videos/From KlickPin CF trending video effect trending trendingvideo effecthousecreator nel 2025.mp4') }}" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture de vidéos.
                            </video>
                            <div class="video-overlay"></div>
                            <div class="video-play-overlay">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="video-content-section">
                        <div class="video-tag">
                            <i class="fas fa-fire"></i>
                            Tendance
                        </div>
                        <h3 class="video-main-title">Effets visuels</h3>
                        <h4 class="video-sub-title">Techniques modernes 2025</h4>
                        <p class="video-description">
                            Découvrez les dernières techniques d'effets visuels utilisées dans l'architecture moderne et la construction.
                        </p>
                        <div class="video-action-buttons">
                            <button class="video-btn video-btn-primary play-video-btn" data-video="effets-visuels">
                                <i class="fas fa-play-circle"></i>Lire la vidéo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vidéo 4: Dossiers techniques -->
        <div class="video-card">
            <div class="video-feature-section">
                <div class="video-feature-wrapper">
                    <div class="video-display-container">
                        <div class="video-aspect-ratio">
                            <video controls preload="metadata" poster="{{ asset('images/placeholders/btp.jpg') }}">
                                <source src="{{ asset('images/videos/From KlickPin CF Pin on دفاتر.mp4') }}" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture de vidéos.
                            </video>
                            <div class="video-overlay"></div>
                            <div class="video-play-overlay">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="video-content-section">
                        <div class="video-tag">
                            <i class="fas fa-book"></i>
                            Technique
                        </div>
                        <h3 class="video-main-title">Dossiers techniques</h3>
                        <h4 class="video-sub-title">Guide complet</h4>
                        <p class="video-description">
                            Un aperçu complet des dossiers techniques essentiels pour vos projets de construction et de rénovation.
                        </p>
                        <div class="video-action-buttons">
                            <button class="video-btn video-btn-primary play-video-btn" data-video="dossiers-techniques">
                                <i class="fas fa-play-circle"></i>Lire la vidéo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour la lecture plein écran -->
<div id="videoModal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex items-center justify-center p-4">
    <div class="relative w-full max-w-4xl">
        <button id="closeModal" class="absolute -top-12 right-0 text-white text-3xl hover:text-gray-300">
            <i class="fas fa-times"></i>
        </button>
        <div id="modalVideoContainer" class="w-full">
            <!-- La vidéo sera insérée ici via JavaScript -->
        </div>
    </div>
</div>

<style>
.video-gallery-header {
    animation: fadeInDown 1s ease-out;
}

.video-card {
    animation: fadeInUp 0.8s ease-out;
}

.video-card:nth-child(2) {
    animation-delay: 0.1s;
}

.video-card:nth-child(3) {
    animation-delay: 0.2s;
}

.video-card:nth-child(4) {
    animation-delay: 0.3s;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('videoModal');
    const closeModal = document.getElementById('closeModal');
    const modalVideoContainer = document.getElementById('modalVideoContainer');
    const playButtons = document.querySelectorAll('.play-video-btn');

    // Fermer le modal
    closeModal.addEventListener('click', function() {
        modal.classList.add('hidden');
        modalVideoContainer.innerHTML = '';
    });

    // Fermer le modal en cliquant en dehors
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.classList.add('hidden');
            modalVideoContainer.innerHTML = '';
        }
    });

    // Jouer une vidéo dans le modal
    playButtons.forEach(button => {
        button.addEventListener('click', function() {
            const videoSrc = this.closest('.video-feature-wrapper').querySelector('video source').src;
            const videoTitle = this.closest('.video-content-section').querySelector('.video-main-title').textContent;
            
            modalVideoContainer.innerHTML = `
                <div class="relative">
                    <video controls autoplay class="w-full rounded-lg shadow-2xl">
                        <source src="${videoSrc}" type="video/mp4">
                        Votre navigateur ne supporte pas la lecture de vidéos.
                    </video>
                    <div class="mt-4 text-center">
                        <h3 class="text-2xl font-bold text-white">${videoTitle}</h3>
                    </div>
                </div>
            `;
            
            modal.classList.remove('hidden');
        });
    });
});
</script>
@endsection