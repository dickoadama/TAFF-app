@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 relative overflow-hidden transition-all duration-500 ease-in-out" id="page-container">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-purple-50 z-0"></div>
    <div class="relative z-10">
        <div class="text-center mb-12 home-hero">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-600 opacity-10 rounded-full blur-3xl mx-auto" style="width: 80%; height: 200px; top: -50px;"></div>
            <h1 class="text-5xl md:text-6xl font-extrabold gradient-text mb-6 relative z-10 animate__animated animate__fadeInDown animate__delay-0.3s">
                Bienvenue sur <span class="font-bold">TAFF</span>
            </h1>
            <p class="text-2xl md:text-3xl text-gray-700 max-w-3xl mx-auto font-medium relative z-10 animate__animated animate__fadeInUp animate__delay-0.6s">
                Trouvez les <span class="text-blue-600 font-bold">meilleurs artisans qualifiés</span> pour tous vos projets
            </p>
            <div class="mt-8 animate__animated animate__fadeIn animate__delay-1s">
                <a href="#services" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 floating animate__animated animate__pulse animate__infinite btn-enhanced" id="discover-button">
                    <i class="fas fa-arrow-down mr-2"></i> Découvrir nos services
                </a>
            </div>
        </div>

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
                            <!-- Vidéo YouTube - remplacez l'URL par celle de la vidéo réelle -->
                            <iframe src="https://www.youtube.com/embed/VIDEO_ID" title="Maison contemporaine - 15 modèles pour s'inspirer" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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

        <div class="home-section animate__animated animate__fadeInUp animate__delay-0.5s" id="services">
            <div class="text-center mb-12">
                <h2 class="home-section-title animate__animated animate__fadeInDown">
                    <span class="gradient-text">Pourquoi choisir TAFF ?</span>
                </h2>
                <p class="home-section-subtitle animate__animated animate__fadeInUp animate__delay-0.3s">
                    TAFF vous permet de trouver rapidement et facilement des artisans qualifiés pour tous vos travaux :
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="service-card card-enhanced animate__animated animate__fadeInUp animate__delay-0.5s transition-all duration-300 hover:transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="500">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-building text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800 animate__animated animate__fadeInUp animate__delay-0.7s">Travaux publics</h3>
                        <p class="text-gray-600 mb-6">Experts en construction, réparation et maintenance d'infrastructures</p>
                        <div class="text-center">
                            <a href="{{ route('categories.travaux_publics') }}" class="inline-block text-blue-600 font-semibold hover:text-blue-800 transition-colors duration-300 btn-enhanced">
                                En savoir plus <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card card-enhanced animate__animated animate__fadeInUp animate__delay-0.7s transition-all duration-300 hover:transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="700">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-home text-3xl text-green-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800 animate__animated animate__fadeInUp animate__delay-0.9s">Construction & Rénovation</h3>
                        <p class="text-gray-600 mb-6">Spécialistes en bâtiment neuf et rénovation complète ou partielle</p>
                        <div class="text-center">
                            <a href="{{ route('categories.construction_renovation') }}" class="inline-block text-green-600 font-semibold hover:text-green-800 transition-colors duration-300 btn-enhanced">
                                En savoir plus <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card card-enhanced animate__animated animate__fadeInUp animate__delay-0.9s transition-all duration-300 hover:transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="900">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-laptop text-3xl text-purple-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800 animate__animated animate__fadeInUp animate__delay-1.1s">Services informatiques</h3>
                        <p class="text-gray-600 mb-6">Dépannage, installation et maintenance informatique</p>
                        <div class="text-center">
                            <a href="{{ route('categories.services_informatiques') }}" class="inline-block text-purple-600 font-semibold hover:text-purple-800 transition-colors duration-300 btn-enhanced">
                                En savoir plus <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card card-enhanced animate__animated animate__fadeInUp animate__delay-1.1s transition-all duration-300 hover:transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="1100">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-tools text-3xl text-yellow-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800 animate__animated animate__fadeInUp animate__delay-1.3s">Et bien plus encore...</h3>
                        <p class="text-gray-600 mb-6">Une large gamme de services pour répondre à tous vos besoins</p>
                        <div class="text-center">
                            <a href="{{ route('categories.plus_encore') }}" class="inline-block text-yellow-600 font-semibold hover:text-yellow-800 transition-colors duration-300 btn-enhanced">
                                Explorer <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="home-section animate__animated animate__fadeInUp animate__delay-0.7s">
            <div class="text-center mb-12">
                <h2 class="home-section-title animate__animated animate__fadeInDown">
                    <span class="gradient-text">Nos artisans mis en avant</span>
                </h2>
                <p class="home-section-subtitle animate__animated animate__fadeInUp animate__delay-0.3s">
                    Découvrez nos artisans les mieux notés et les plus expérimentés
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredArtisans as $artisan)
                <div class="artisan-card bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-xl animate__animated animate__fadeInUp animate__delay-{{ ($loop->index + 1) * 200 }}ms card-enhanced">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="artisan-avatar bg-gradient-to-br from-blue-100 to-purple-100 border-2 border-dashed rounded-2xl w-16 h-16 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-user text-2xl text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl text-gray-800">{{ $artisan->name }}</h3>
                                <p class="text-blue-600 font-medium">{{ $artisan->serviceCategory->name ?? 'Catégorie non définie' }}</p>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-100 pt-4 mt-4">
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-blue-500 mr-2"></i>
                                    <span class="text-gray-700 text-sm">{{ $artisan->email }}</span>
                                </div>
                                @if($artisan->phone)
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-green-500 mr-2"></i>
                                    <span class="text-gray-700 text-sm">{{ $artisan->phone }}</span>
                                </div>
                                @endif
                                @if($artisan->address)
                                <div class="flex items-start">
                                    <i class="fas fa-map-marker-alt text-red-500 mr-2 mt-1"></i>
                                    <span class="text-gray-700 text-sm">{{ $artisan->address }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="mt-6 text-center">
                            <a href="{{ route('artisans.show', $artisan) }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-2 px-5 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105 btn-enhanced">
                                Voir profil complet
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="home-section animate__animated animate__fadeInUp animate__delay-0.9s">
            <div class="text-center mb-12">
                <h2 class="home-section-title animate__animated animate__fadeInDown">
                    <span class="gradient-text">Accédez à nos services</span>
                </h2>
                <p class="home-section-subtitle animate__animated animate__fadeInUp animate__delay-0.3s">
                    Explorez notre plateforme pour trouver l'artisan parfait, gérer vos demandes et suivre vos projets
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="service-card card-enhanced animate__animated animate__fadeInUp animate__delay-0.5s transition-all duration-300 hover:transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="500">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-home text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="mb-4 font-bold text-2xl text-gray-800 animate__animated animate__fadeInUp animate__delay-0.7s">Accueil</h3>
                        <p class="text-gray-600 mb-6 animate__animated animate__fadeInUp animate__delay-0.9s">Page d'accueil de la plateforme</p>
                        <a href="{{ route('home') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-1.1s btn-enhanced">
                            <i class="fas fa-arrow-right mr-2"></i>Accéder
                        </a>
                    </div>
                </div>
                
                <div class="service-card card-enhanced animate__animated animate__fadeInUp animate__delay-0.7s transition-all duration-300 hover:transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="700">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-hard-hat text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="mb-4 font-bold text-2xl text-gray-800 animate__animated animate__fadeInUp animate__delay-0.9s">Artisans</h3>
                        <p class="text-gray-600 mb-6 animate__animated animate__fadeInUp animate__delay-1.1s">Gestion et consultation des artisans</p>
                        <a href="{{ route('artisans.index') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-1.3s btn-enhanced">
                            <i class="fas fa-arrow-right mr-2"></i>Voir les artisans
                        </a>
                    </div>
                </div>
                
                <div class="service-card card-enhanced animate__animated animate__fadeInUp animate__delay-0.9s transition-all duration-300 hover:transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="900">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-folder text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="mb-4 font-bold text-2xl text-gray-800 animate__animated animate__fadeInUp animate__delay-1.1s">Catégories</h3>
                        <p class="text-gray-600 mb-6 animate__animated animate__fadeInUp animate__delay-1.3s">Classification des services par catégories</p>
                        <a href="{{ route('service-categories.index') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-1.5s btn-enhanced">
                            <i class="fas fa-arrow-right mr-2"></i>Voir les catégories
                        </a>
                    </div>
                </div>
                
                <div class="service-card card-enhanced animate__animated animate__fadeInUp animate__delay-1.1s transition-all duration-300 hover:transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="1100">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-file-invoice text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="mb-4 font-bold text-2xl text-gray-800 animate__animated animate__fadeInUp animate__delay-1.3s">Devis</h3>
                        <p class="text-gray-600 mb-6 animate__animated animate__fadeInUp animate__delay-1.5s">Création et suivi des devis</p>
                        <a href="{{ route('quotes.index') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-1.7s btn-enhanced">
                            <i class="fas fa-arrow-right mr-2"></i>Voir les devis
                        </a>
                    </div>
                </div>
                
                <div class="service-card card-enhanced animate__animated animate__fadeInUp animate__delay-1.3s transition-all duration-300 hover:transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="1300">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-file-invoice text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="mb-4 font-bold text-2xl text-gray-800 animate__animated animate__fadeInUp animate__delay-1.5s">Devis</h3>
                        <p class="text-gray-600 mb-6 animate__animated animate__fadeInUp animate__delay-1.7s">Gestion des devis reçus des artisans</p>
                        <a href="{{ route('quotes.index') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-1.9s btn-enhanced">
                            <i class="fas fa-arrow-right mr-2"></i>Voir les devis
                        </a>
                    </div>
                </div>
                
                <div class="service-card card-enhanced animate__animated animate__fadeInUp animate__delay-1.5s transition-all duration-300 hover:transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="1500">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-receipt text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="mb-4 font-bold text-2xl text-gray-800 animate__animated animate__fadeInUp animate__delay-1.7s">Factures</h3>
                        <p class="text-gray-600 mb-6 animate__animated animate__fadeInUp animate__delay-1.9s">Consultation et gestion des factures</p>
                        <a href="{{ route('invoices.index') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-2.1s btn-enhanced">
                            <i class="fas fa-arrow-right mr-2"></i>Voir les factures
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="home-section animate__animated animate__fadeInUp animate__delay-1.1s">
            <div class="text-center mb-12">
                <h2 class="home-section-title animate__animated animate__fadeInDown">
                    <span class="gradient-text">Ce que disent nos clients</span>
                </h2>
                <p class="home-section-subtitle animate__animated animate__fadeInUp animate__delay-0.3s">
                    Découvrez les expériences de nos utilisateurs satisfaits
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="testimonial-card animate__animated animate__fadeInUp animate__delay-0.5s card-enhanced">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-br from-blue-100 to-purple-100 border-2 border-dashed rounded-2xl w-16 h-16 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-user text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl text-gray-800">Marie Dubois</h4>
                            <div class="text-yellow-500 flex text-lg">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic text-lg mb-6">"J'ai trouvé l'artisan parfait pour ma rénovation grâce à TAFF. Service rapide et professionnel !"</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-quote-left text-blue-600"></i>
                        </div>
                        <span class="text-blue-600 font-semibold">Client satisfait</span>
                    </div>
                </div>
                
                <div class="testimonial-card animate__animated animate__fadeInUp animate__delay-0.7s card-enhanced">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-br from-blue-100 to-purple-100 border-2 border-dashed rounded-2xl w-16 h-16 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-user text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl text-gray-800">Jean Martin</h4>
                            <div class="text-yellow-500 flex text-lg">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic text-lg mb-6">"La plateforme est très intuitive et les artisans sont de confiance. Je recommande vivement !"</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-quote-left text-blue-600"></i>
                        </div>
                        <span class="text-blue-600 font-semibold">Client satisfait</span>
                    </div>
                </div>
                
                <div class="testimonial-card animate__animated animate__fadeInUp animate__delay-0.9s card-enhanced">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-br from-blue-100 to-purple-100 border-2 border-dashed rounded-2xl w-16 h-16 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-user text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl text-gray-800">Sophie Lambert</h4>
                            <div class="text-yellow-500 flex text-lg">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic text-lg mb-6">"J'ai pu comparer plusieurs devis et choisir le meilleur rapport qualité-prix. Excellente expérience !"</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-quote-left text-blue-600"></i>
                        </div>
                        <span class="text-blue-600 font-semibold">Client satisfait</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Zone flottante pour Nos Œuvres, Nos Partenariats, Nos Contacts -->
        <div class="floating-section-container mb-16 animate__animated animate__fadeInUp animate__delay-1.3s">
            <div class="text-center mb-12">
                <h2 class="home-section-title animate__animated animate__fadeInDown">
                    <span class="gradient-text">Découvrez nos réalisations</span>
                </h2>
                <p class="home-section-subtitle animate__animated animate__fadeInUp animate__delay-0.3s">
                    Explorez nos œuvres, partenariats et contacts
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Nos Œuvres -->
                <div class="floating-card animate__animated animate__fadeInUp animate__delay-0.5s card-enhanced">
                    <div class="p-8 text-center">
                        <div class="floating-icon-container mb-6">
                            <i class="fas fa-paint-brush text-4xl text-blue-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800">Nos Œuvres</h3>
                        <p class="text-gray-600 mb-6">Découvrez nos réalisations et projets accomplis avec succès</p>
                        <a href="{{ route('works.index') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105 btn-enhanced">
                            <i class="fas fa-eye mr-2"></i>Voir les œuvres
                        </a>
                    </div>
                </div>
                
                <!-- Nos Partenariats -->
                <div class="floating-card animate__animated animate__fadeInUp animate__delay-0.7s card-enhanced">
                    <div class="p-8 text-center">
                        <div class="floating-icon-container mb-6">
                            <i class="fas fa-handshake text-4xl text-green-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800">Nos Partenariats</h3>
                        <p class="text-gray-600 mb-6">Découvrez nos partenaires et collaborations stratégiques</p>
                        <a href="{{ route('partners.index') }}" class="inline-block bg-gradient-to-r from-green-500 to-teal-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105 btn-enhanced">
                            <i class="fas fa-users mr-2"></i>Voir les partenaires
                        </a>
                    </div>
                </div>
                
                <!-- Nos Contacts -->
                <div class="floating-card animate__animated animate__fadeInUp animate__delay-0.9s card-enhanced">
                    <div class="p-8 text-center">
                        <div class="floating-icon-container mb-6">
                            <i class="fas fa-address-book text-4xl text-purple-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800">Nos Contacts</h3>
                        <p class="text-gray-600 mb-6">Contactez-nous pour toute question ou demande d'information</p>
                        <a href="{{ route('contacts.index') }}" class="inline-block bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105 btn-enhanced">
                            <i class="fas fa-envelope mr-2"></i>Nous contacter
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-16 animate__animated animate__fadeInUp animate__delay-1.5s">
            <div class="stat-card animate__animated animate__fadeInUp animate__delay-0.5s card-enhanced bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-2xl shadow-2xl p-6 transform transition-all duration-300 hover:scale-105">
                <div class="stat-icon-container flex justify-center mb-4">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <i class="fas fa-users text-3xl"></i>
                    </div>
                </div>
                <div class="text-4xl font-extrabold mb-2 text-center animate__animated animate__fadeInUp text-yellow-300">500+</div>
                <div class="text-xl font-bold text-center animate__animated animate__fadeInUp">Artisans qualifiés</div>
            </div>
            
            <div class="stat-card animate__animated animate__fadeInUp animate__delay-0.7s card-enhanced bg-gradient-to-br from-green-500 to-teal-600 text-white rounded-2xl shadow-2xl p-6 transform transition-all duration-300 hover:scale-105">
                <div class="stat-icon-container flex justify-center mb-4">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <i class="fas fa-clipboard-check text-3xl"></i>
                    </div>
                </div>
                <div class="text-4xl font-extrabold mb-2 text-center animate__animated animate__fadeInUp text-yellow-300">1200+</div>
                <div class="text-xl font-bold text-center animate__animated animate__fadeInUp">Projets réalisés</div>
            </div>
            
            <div class="stat-card animate__animated animate__fadeInUp animate__delay-0.9s card-enhanced bg-gradient-to-br from-amber-500 to-orange-600 text-white rounded-2xl shadow-2xl p-6 transform transition-all duration-300 hover:scale-105">
                <div class="stat-icon-container flex justify-center mb-4">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <i class="fas fa-smile text-3xl"></i>
                    </div>
                </div>
                <div class="text-4xl font-extrabold mb-2 text-center animate__animated animate__fadeInUp text-yellow-300">98%</div>
                <div class="text-xl font-bold text-center animate__animated animate__fadeInUp">Satisfaction clients</div>
            </div>
            
            <div class="stat-card animate__animated animate__fadeInUp animate__delay-1.1s card-enhanced bg-gradient-to-br from-purple-500 to-pink-600 text-white rounded-2xl shadow-2xl p-6 transform transition-all duration-300 hover:scale-105">
                <div class="stat-icon-container flex justify-center mb-4">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-3xl"></i>
                    </div>
                </div>
                <div class="text-4xl font-extrabold mb-2 text-center animate__animated animate__fadeInUp text-yellow-300">5 ans</div>
                <div class="text-xl font-bold text-center animate__animated animate__fadeInUp">d'expérience</div>
            </div>
        </div>
    </div>
</div>
@endsection