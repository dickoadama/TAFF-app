@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Test de la section vidéo</h1>
    
    <!-- Section Vidéo Maison contemporaine -->
    <div class="home-section animate__animated animate__fadeInUp animate__delay-0.5s">
        <div class="video-section-header">
            <h2 class="video-section-title animate__animated animate__fadeInDown">
                Inspiration pour vos projets
            </h2>
            <p class="video-section-subtitle animate__animated animate__fadeInUp animate__delay-0.1s">
                Découvrez des idées pour vos travaux de construction et de rénovation
            </p>
        </div>
        
        <div class="video-feature-section">
            <div class="video-feature-wrapper">
                <div class="video-display-container">
                    <div class="video-aspect-ratio">
                        <!-- Vidéo YouTube - exemple avec une vidéo réelle -->
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Maison contemporaine - 15 modèles pour s'inspirer" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="video-overlay"></div>
                        <div class="video-play-overlay">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>
                
                <div class="video-content-section">
                    <div class="video-tag">
                        <i class="fas fa-star"></i>
                        Vidéo en vedette
                    </div>
                    <h3 class="video-main-title">Maison contemporaine</h3>
                    <h4 class="video-sub-title">15 modèles pour s'inspirer</h4>
                    <p class="video-description">
                        Découvrez 15 modèles de maisons contemporaines qui pourraient vous inspirer pour votre prochain projet de construction ou de rénovation. 
                        Cette vidéo présente des designs innovants, fonctionnels et esthétiques qui s'adaptent à tous les styles de vie.
                    </p>
                    <div class="video-action-buttons">
                        <a href="#" class="video-btn video-btn-primary">
                            <i class="fas fa-play-circle"></i>Voir la vidéo
                        </a>
                        <a href="#" class="video-btn video-btn-secondary">
                            <i class="fas fa-info-circle"></i>En savoir plus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de la section vidéo -->
</div>
@endsection