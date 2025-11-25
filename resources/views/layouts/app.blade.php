<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TAFF') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/embellishment.css', 'resources/css/responsive.css', 'resources/css/placeholders.css', 'resources/css/home.css', 'resources/js/app.js'])
    
    <!-- Styles -->
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- AOS (Animate On Scroll) for scroll animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav id="main-nav" class="navbar sticky top-0 z-50 bg-white shadow-lg transition-all duration-500 ease-in-out transform hover:shadow-xl animate__animated animate__fadeInDown">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="navbar-brand transition-all duration-300 transform hover:scale-105 animate__animated animate__pulse animate__infinite">
                            <img src="{{ asset('images/WhatsApp Image 2025-11-25 at 11.34.40.jpeg') }}" alt="{{ config('app.name', 'TAFF') }}" class="h-12 w-auto object-contain">
                        </a>
                    </div>
                    
                    <!-- Zone de recherche -->
                    <div class="hidden md:block flex-1 max-w-md mx-4">
                        <form action="{{ route('search') }}" method="GET" class="search-form">
                            <div class="search-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <input type="text" name="q" placeholder="Rechercher des artisans, services..." class="search-input">
                            <button type="submit" class="search-button">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                    
                    <div class="hidden md:block">
                        <div class="flex items-baseline space-x-1">
                            <a href="{{ route('home') }}" class="navbar-link {{ request()->routeIs('home') ? 'bg-primary text-white' : '' }} px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 hover:bg-primary hover:text-white transform hover:-translate-y-0.5 hover:shadow-lg animate__animated animate__fadeInUp animate__delay-0.1s">
                                <i class="fas fa-home mr-1"></i> Accueil
                            </a>
                            <div class="relative group">
                                <a href="{{ route('artisans.index') }}" class="navbar-link {{ request()->routeIs('artisans.*') ? 'bg-primary text-white' : '' }} px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 hover:bg-primary hover:text-white transform hover:-translate-y-0.5 hover:shadow-lg animate__animated animate__fadeInUp animate__delay-0.2s">
                                    <i class="fas fa-hard-hat mr-1"></i> Artisans
                                </a>
                                <div class="absolute left-0 mt-2 w-64 bg-white rounded-md shadow-lg py-2 hidden group-hover:block z-50">
                                    <a href="{{ route('artisans.subcategories') }}#services" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-concierge-bell mr-2"></i> Service
                                    </a>
                                    <a href="{{ route('artisans.subcategories') }}#alimentation" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-utensils mr-2"></i> Alimentation
                                    </a>
                                    <a href="{{ route('artisans.subcategories') }}#fabrication" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-tools mr-2"></i> Fabrication
                                    </a>
                                    <a href="{{ route('artisans.subcategories') }}#batiment" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-building mr-2"></i> Bâtiment
                                    </a>
                                </div>
                            </div>
                            <div class="relative group">
                                <a href="{{ route('service-categories.index') }}" class="navbar-link {{ request()->routeIs('service-categories.*') ? 'bg-primary text-white' : '' }} px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 hover:bg-primary hover:text-white transform hover:-translate-y-0.5 hover:shadow-lg animate__animated animate__fadeInUp animate__delay-0.3s">
                                    <i class="fas fa-folder mr-1"></i> Catégories
                                </a>
                                <div class="absolute left-0 mt-2 w-64 bg-white rounded-md shadow-lg py-2 hidden group-hover:block z-50">
                                    <a href="{{ route('categories.btp') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-building mr-2"></i> BTP
                                    </a>
                                    <a href="{{ route('categories.informatique') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-laptop mr-2"></i> Informatique
                                    </a>
                                    <a href="{{ route('categories.securite') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-shield-alt mr-2"></i> Sécurité & Surveillance
                                    </a>
                                    <a href="{{ route('categories.applications') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-mobile-alt mr-2"></i> Applications & Sites
                                    </a>
                                    <a href="{{ route('artisans.examples') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-user-alt mr-2"></i> Exemples d'artisans
                                    </a>
                                </div>
                            </div>
                            <a href="{{ route('service-requests.index') }}" class="navbar-link {{ request()->routeIs('service-requests.*') ? 'bg-primary text-white' : '' }} px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 hover:bg-primary hover:text-white transform hover:-translate-y-0.5 hover:shadow-lg animate__animated animate__fadeInUp animate__delay-0.4s">
                                <i class="fas fa-clipboard-list mr-1"></i> Demandes
                            </a>
                            <a href="{{ route('quotes.index') }}" class="navbar-link {{ request()->routeIs('quotes.*') ? 'bg-primary text-white' : '' }} px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 hover:bg-primary hover:text-white transform hover:-translate-y-0.5 hover:shadow-lg animate__animated animate__fadeInUp animate__delay-0.5s">
                                <i class="fas fa-file-invoice mr-1"></i> Devis
                            </a>
                            <a href="{{ route('invoices.index') }}" class="navbar-link {{ request()->routeIs('invoices.*') ? 'bg-primary text-white' : '' }} px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 hover:bg-primary hover:text-white transform hover:-translate-y-0.5 hover:shadow-lg animate__animated animate__fadeInUp animate__delay-0.6s">
                                <i class="fas fa-receipt mr-1"></i> Factures
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>




        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="container py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="flex-grow">
            <div class="container py-6">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                
                @yield('content')
            </div>
        </main>

        <!-- Footer amélioré -->
        <footer class="footer bg-gradient-to-r from-blue-900 to-purple-900 text-white pt-16 pb-8">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                    <!-- Colonne 1: Logo et description -->
                    <div class="footer-column">
                        <img src="{{ asset('images/WhatsApp Image 2025-11-25 at 11.34.40.jpeg') }}" alt="{{ config('app.name', 'TAFF') }}" class="h-16 w-auto object-contain mb-4 mx-auto">
                        <p class="text-blue-200 mb-6">Trouvez les meilleurs artisans qualifiés pour tous vos projets de construction, rénovation et services.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-blue-300 transition-colors duration-300">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors duration-300">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors duration-300">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors duration-300">
                                <i class="fab fa-linkedin-in text-xl"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Colonne 2: Liens rapides -->
                    <div class="footer-column">
                        <h4 class="text-lg font-bold mb-4">Liens rapides</h4>
                        <ul class="space-y-2">
                            <li><a href="{{ route('home') }}" class="text-blue-200 hover:text-white transition-colors duration-300">Accueil</a></li>
                            <li><a href="{{ route('artisans.index') }}" class="text-blue-200 hover:text-white transition-colors duration-300">Nos artisans</a></li>
                            <li><a href="{{ route('service-categories.index') }}" class="text-blue-200 hover:text-white transition-colors duration-300">Catégories</a></li>
                            <li><a href="{{ route('artisans.examples') }}" class="text-blue-200 hover:text-white transition-colors duration-300">Exemples d'artisans</a></li>
                            <li><a href="#" class="text-blue-200 hover:text-white transition-colors duration-300">Nos œuvres</a></li>
                            <li><a href="#" class="text-blue-200 hover:text-white transition-colors duration-300">Partenariats</a></li>
                        </ul>
                    </div>
                    
                    <!-- Colonne 3: Services -->
                    <div class="footer-column">
                        <h4 class="text-lg font-bold mb-4">Nos services</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-blue-200 hover:text-white transition-colors duration-300">Travaux publics</a></li>
                            <li><a href="#" class="text-blue-200 hover:text-white transition-colors duration-300">Construction & Rénovation</a></li>
                            <li><a href="#" class="text-blue-200 hover:text-white transition-colors duration-300">Services informatiques</a></li>
                            <li><a href="#" class="text-blue-200 hover:text-white transition-colors duration-300">Maintenance</a></li>
                            <li><a href="#" class="text-blue-200 hover:text-white transition-colors duration-300">Sécurité & Surveillance</a></li>
                        </ul>
                    </div>
                    
                    <!-- Colonne 4: Contact -->
                    <div class="footer-column">
                        <h4 class="text-lg font-bold mb-4">Contactez-nous</h4>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt text-blue-300 mt-1 mr-3"></i>
                                <span class="text-blue-200">Abidjan, Côte d'Ivoire</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-phone-alt text-blue-300 mt-1 mr-3"></i>
                                <span class="text-blue-200">+225 07 672 942 55</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-phone-alt text-blue-300 mt-1 mr-3"></i>
                                <span class="text-blue-200">+225 07 779 695 75</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-envelope text-blue-300 mt-1 mr-3"></i>
                                <span class="text-blue-200">dickoadama08@gmail.com</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-envelope text-blue-300 mt-1 mr-3"></i>
                                <span class="text-blue-200">sidikibamba278@gmail.com</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Ligne de séparation -->
                <div class="border-t border-blue-800 pt-8 mt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p class="text-blue-300 text-center md:text-left mb-4 md:mb-0">&copy; {{ date('Y') }} {{ config('app.name', 'TAFF') }}. Tous droits réservés.</p>
                        <div class="flex space-x-6">
                            <a href="#" class="text-blue-300 hover:text-white transition-colors duration-300">Politique de confidentialité</a>
                            <a href="#" class="text-blue-300 hover:text-white transition-colors duration-300">Conditions d'utilisation</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Boutons flottants -->
        <div class="fixed bottom-6 right-6 flex flex-col space-y-4 z-40">
            <!-- Bouton retour en haut -->
            <button id="back-to-top" class="hidden bg-gray-800 text-white rounded-full p-3 shadow-lg hover:bg-gray-900 transition-all duration-300 transform hover:scale-110 animate__animated animate__bounceInUp">
                <i class="fas fa-arrow-up"></i>
            </button>
            
            <!-- Notification flottante -->
            <div id="notification-badge" class="hidden absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold animate__animated animate__bounceIn">
                3
            </div>
        </div>
    </div>

    <!-- AOS Library for scroll animations -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1000,
                once: true,
                easing: 'ease-in-out',
            });
        });
        

        
        // Back to top button
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopButton = document.getElementById('back-to-top');
            
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.remove('hidden');
                    backToTopButton.classList.add('animate__animated', 'animate__fadeInUp');
                } else {
                    backToTopButton.classList.add('hidden');
                }
            });
            
            backToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
        
        // Ajout d'effets de survol sur les cartes
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.classList.add('animate__animated', 'animate__pulse');
                });
                
                card.addEventListener('mouseleave', function() {
                    this.classList.remove('animate__animated', 'animate__pulse');
                });
            });
        });
        
        // Animation des boutons au clic
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('button, .btn-primary, .btn-secondary, .btn-accent, .btn-success, .btn-danger');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    this.classList.add('animate__animated', 'animate__rubberBand');
                    setTimeout(() => {
                        this.classList.remove('animate__animated', 'animate__rubberBand');
                    }, 1000);
                });
            });
        });
    </script>
</body>
</html>