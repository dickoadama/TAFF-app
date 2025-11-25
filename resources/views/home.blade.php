@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 relative overflow-hidden">
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
                <a href="#services" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 floating">
                    <i class="fas fa-arrow-down mr-2"></i> Découvrir nos services
                </a>
            </div>
        </div>

        <div class="home-section" data-aos="fade-up" id="services">
            <div class="text-center mb-12">
                <h2 class="home-section-title" data-aos="fade-down">
                    <span class="gradient-text">Pourquoi choisir TAFF ?</span>
                </h2>
                <p class="home-section-subtitle" data-aos="fade-up" data-aos-delay="300">
                    TAFF vous permet de trouver rapidement et facilement des artisans qualifiés pour tous vos travaux :
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="service-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-building text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800" data-aos="fade-up">Travaux publics</h3>
                        <p class="text-gray-600 mb-6">Experts en construction, réparation et maintenance d'infrastructures</p>
                        <div class="text-center">
                            <a href="#" class="inline-block text-blue-600 font-semibold hover:text-blue-800 transition-colors duration-300">
                                En savoir plus <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card" data-aos="fade-up" data-aos-delay="700">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-home text-3xl text-green-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800" data-aos="fade-up">Construction & Rénovation</h3>
                        <p class="text-gray-600 mb-6">Spécialistes en bâtiment neuf et rénovation complète ou partielle</p>
                        <div class="text-center">
                            <a href="#" class="inline-block text-green-600 font-semibold hover:text-green-800 transition-colors duration-300">
                                En savoir plus <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card" data-aos="fade-up" data-aos-delay="900">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-laptop text-3xl text-purple-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800" data-aos="fade-up">Services informatiques</h3>
                        <p class="text-gray-600 mb-6">Dépannage, installation et maintenance informatique</p>
                        <div class="text-center">
                            <a href="#" class="inline-block text-purple-600 font-semibold hover:text-purple-800 transition-colors duration-300">
                                En savoir plus <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card" data-aos="fade-up" data-aos-delay="1100">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-tools text-3xl text-yellow-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800" data-aos="fade-up">Et bien plus encore...</h3>
                        <p class="text-gray-600 mb-6">Une large gamme de services pour répondre à tous vos besoins</p>
                        <div class="text-center">
                            <a href="#" class="inline-block text-yellow-600 font-semibold hover:text-yellow-800 transition-colors duration-300">
                                Explorer <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="home-section" data-aos="fade-up">
            <div class="text-center mb-12">
                <h2 class="home-section-title" data-aos="fade-down">
                    <span class="gradient-text">Nos artisans mis en avant</span>
                </h2>
                <p class="home-section-subtitle" data-aos="fade-up" data-aos-delay="300">
                    Découvrez nos artisans les mieux notés et les plus expérimentés
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredArtisans as $artisan)
                <div class="artisan-card" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 200 }}">
                    <div class="p-6">
                        <div class="flex items-center mb-6">
                            <div class="artisan-avatar">
                                <i class="fas fa-user text-2xl text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl text-gray-800">{{ $artisan->name }}</h3>
                                <p class="text-blue-600 font-medium">{{ $artisan->serviceCategory->name ?? 'Catégorie non définie' }}</p>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6 line-clamp-3">{{ Str::limit($artisan->description, 120) }}</p>
                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <div>
                                <span class="text-yellow-500 flex">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $artisan->rating)
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </span>
                                <span class="text-gray-500 text-sm ml-2">({{ $artisan->rating }}/5)</span>
                            </div>
                            <a href="{{ route('artisans.show', $artisan) }}" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-2 px-5 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                Voir profil
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="home-section" data-aos="fade-up">
            <div class="text-center mb-12">
                <h2 class="home-section-title" data-aos="fade-down">
                    <span class="gradient-text">Accédez à nos services</span>
                </h2>
                <p class="home-section-subtitle" data-aos="fade-up" data-aos-delay="300">
                    Explorez notre plateforme pour trouver l'artisan parfait, gérer vos demandes et suivre vos projets
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="service-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-home text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="mb-4 font-bold text-2xl text-gray-800" data-aos="fade-up">Accueil</h3>
                        <p class="text-gray-600 mb-6" data-aos="fade-up">Page d'accueil de la plateforme</p>
                        <a href="{{ route('home') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105" data-aos="fade-up">
                            <i class="fas fa-arrow-right mr-2"></i>Accéder
                        </a>
                    </div>
                </div>
                
                <div class="service-card" data-aos="fade-up" data-aos-delay="700">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-hard-hat text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="mb-4 font-bold text-2xl text-gray-800" data-aos="fade-up">Artisans</h3>
                        <p class="text-gray-600 mb-6" data-aos="fade-up">Gestion et consultation des artisans</p>
                        <a href="{{ route('artisans.index') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105" data-aos="fade-up">
                            <i class="fas fa-arrow-right mr-2"></i>Voir les artisans
                        </a>
                    </div>
                </div>
                
                <div class="service-card" data-aos="fade-up" data-aos-delay="900">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-folder text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="mb-4 font-bold text-2xl text-gray-800" data-aos="fade-up">Catégories</h3>
                        <p class="text-gray-600 mb-6" data-aos="fade-up">Classification des services par catégories</p>
                        <a href="{{ route('service-categories.index') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105" data-aos="fade-up">
                            <i class="fas fa-arrow-right mr-2"></i>Voir les catégories
                        </a>
                    </div>
                </div>
                
                <div class="service-card" data-aos="fade-up" data-aos-delay="1100">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-clipboard-list text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="mb-4 font-bold text-2xl text-gray-800" data-aos="fade-up">Demandes</h3>
                        <p class="text-gray-600 mb-6" data-aos="fade-up">Création et suivi des demandes de service</p>
                        <a href="{{ route('service-requests.index') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105" data-aos="fade-up">
                            <i class="fas fa-arrow-right mr-2"></i>Voir les demandes
                        </a>
                    </div>
                </div>
                
                <div class="service-card" data-aos="fade-up" data-aos-delay="1300">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-file-invoice text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="mb-4 font-bold text-2xl text-gray-800" data-aos="fade-up">Devis</h3>
                        <p class="text-gray-600 mb-6" data-aos="fade-up">Gestion des devis reçus des artisans</p>
                        <a href="{{ route('quotes.index') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105" data-aos="fade-up">
                            <i class="fas fa-arrow-right mr-2"></i>Voir les devis
                        </a>
                    </div>
                </div>
                
                <div class="service-card" data-aos="fade-up" data-aos-delay="1500">
                    <div class="p-8 text-center">
                        <div class="service-icon-container">
                            <i class="fas fa-receipt text-3xl text-blue-600"></i>
                        </div>
                        <h3 class="mb-4 font-bold text-2xl text-gray-800" data-aos="fade-up">Factures</h3>
                        <p class="text-gray-600 mb-6" data-aos="fade-up">Consultation et gestion des factures</p>
                        <a href="{{ route('invoices.index') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105" data-aos="fade-up">
                            <i class="fas fa-arrow-right mr-2"></i>Voir les factures
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="home-section" data-aos="fade-up">
            <div class="text-center mb-12">
                <h2 class="home-section-title" data-aos="fade-down">
                    <span class="gradient-text">Ce que disent nos clients</span>
                </h2>
                <p class="home-section-subtitle" data-aos="fade-up" data-aos-delay="300">
                    Découvrez les expériences de nos utilisateurs satisfaits
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="testimonial-card" data-aos="fade-up" data-aos-delay="300">
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
                
                <div class="testimonial-card" data-aos="fade-up" data-aos-delay="600">
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
                
                <div class="testimonial-card" data-aos="fade-up" data-aos-delay="900">
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
        <div class="floating-section-container mb-16" data-aos="fade-up">
            <div class="text-center mb-12">
                <h2 class="home-section-title" data-aos="fade-down">
                    <span class="gradient-text">Découvrez nos réalisations</span>
                </h2>
                <p class="home-section-subtitle" data-aos="fade-up" data-aos-delay="300">
                    Explorez nos œuvres, partenariats et contacts
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Nos Œuvres -->
                <div class="floating-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-8 text-center">
                        <div class="floating-icon-container mb-6">
                            <i class="fas fa-paint-brush text-4xl text-blue-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800">Nos Œuvres</h3>
                        <p class="text-gray-600 mb-6">Découvrez nos réalisations et projets accomplis avec succès</p>
                        <a href="#" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-eye mr-2"></i>Voir les œuvres
                        </a>
                    </div>
                </div>
                
                <!-- Nos Partenariats -->
                <div class="floating-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="p-8 text-center">
                        <div class="floating-icon-container mb-6">
                            <i class="fas fa-handshake text-4xl text-green-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800">Nos Partenariats</h3>
                        <p class="text-gray-600 mb-6">Découvrez nos partenaires et collaborations stratégiques</p>
                        <a href="#" class="inline-block bg-gradient-to-r from-green-500 to-teal-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-users mr-2"></i>Voir les partenaires
                        </a>
                    </div>
                </div>
                
                <!-- Nos Contacts -->
                <div class="floating-card" data-aos="fade-up" data-aos-delay="700">
                    <div class="p-8 text-center">
                        <div class="floating-icon-container mb-6">
                            <i class="fas fa-address-book text-4xl text-purple-600"></i>
                        </div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-800">Nos Contacts</h3>
                        <p class="text-gray-600 mb-6">Contactez-nous pour toute question ou demande d'information</p>
                        <a href="#" class="inline-block bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-envelope mr-2"></i>Nous contacter
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-16">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-icon-container">
                    <i class="fas fa-users text-3xl"></i>
                </div>
                <div class="text-4xl font-bold mb-2" data-aos="fade-up">500+</div>
                <div class="text-xl font-medium" data-aos="fade-up">Artisans qualifiés</div>
            </div>
            
            <div class="stat-card" data-aos="fade-up" data-aos-delay="500">
                <div class="stat-icon-container">
                    <i class="fas fa-clipboard-check text-3xl"></i>
                </div>
                <div class="text-4xl font-bold mb-2" data-aos="fade-up">1200+</div>
                <div class="text-xl font-medium" data-aos="fade-up">Projets réalisés</div>
            </div>
            
            <div class="stat-card" data-aos="fade-up" data-aos-delay="700">
                <div class="stat-icon-container">
                    <i class="fas fa-smile text-3xl"></i>
                </div>
                <div class="text-4xl font-bold mb-2" data-aos="fade-up">98%</div>
                <div class="text-xl font-medium" data-aos="fade-up">Satisfaction clients</div>
            </div>
            
            <div class="stat-card" data-aos="fade-up" data-aos-delay="900">
                <div class="stat-icon-container">
                    <i class="fas fa-calendar-alt text-3xl"></i>
                </div>
                <div class="text-4xl font-bold mb-2" data-aos="fade-up">5 ans</div>
                <div class="text-xl font-medium" data-aos="fade-up">d'expérience</div>
            </div>
        </div>
    </div>
</div>
@endsection