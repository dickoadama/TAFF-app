<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TAFF') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/embellishment.css', 'resources/css/video-section.css', 'resources/css/typography.css', 'resources/css/forms.css', 'resources/css/tables.css', 'resources/css/footer.css'])
    
    <!-- Fallback pour Vite -->
    @if (!app()->environment('local'))
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/embellishment.css') }}">
        <link rel="stylesheet" href="{{ asset('css/video-section.css') }}">
        <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
        <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
        <link rel="stylesheet" href="{{ asset('css/tables.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    @endif
    
    <style>
        /* Animation de fond pour tout le site */
        body {
            background: linear-gradient(-45deg, #1e3a8a, #312e81, #3730a3, #312e81);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
        }
        
        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        
        /* Effet de flou pour le contenu principal */
        .main-content {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        /* Animation pour les cartes */
        .card-animated {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .card-animated::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }
        
        .card-animated:hover::before {
            left: 100%;
        }
        
        .card-animated:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        /* Scrollbar personnalisée */
        ::-webkit-scrollbar {
            width: 12px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #f59e0b, #ea580c);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #ea580c, #dc2626);
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-gradient-to-r from-blue-800 to-indigo-900 shadow-2xl">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-extrabold text-yellow-300 tracking-wide animate__animated animate__fadeInDown">
                        {{ $header }}
                    </h1>
                </div>
            </header>
        @endif

        <!-- Zone de recherche -->
        <div class="search-container transition-all duration-300 ease-in-out bg-gradient-to-r from-blue-700 to-indigo-800 py-4 shadow-xl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <form method="GET" action="{{ route('search') }}" class="flex items-center transition-all duration-300 ease-in-out">
                    <div class="relative flex-grow">
                        <input 
                            type="text" 
                            name="query" 
                            placeholder="Rechercher des artisans, services, catégories..." 
                            class="search-input w-full rounded-full border-2 border-yellow-400 py-3 px-6 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-yellow-400 focus:border-transparent shadow-xl transition-all duration-300 ease-in-out hover:shadow-yellow-400/50"
                            value="{{ request('query') }}"
                        >
                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 search-icon-wrapper transition-all duration-300 ease-in-out">
                            <svg class="search-icon h-6 w-6 text-yellow-400 transition-all duration-300 ease-in-out hover:scale-110" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <button 
                        type="submit" 
                        class="search-button ml-3 inline-flex items-center px-6 py-3 border-2 border-yellow-400 text-lg font-bold rounded-full shadow-xl text-yellow-300 bg-gradient-to-r from-blue-700 to-indigo-800 hover:from-blue-600 hover:to-indigo-700 focus:outline-none focus:ring-4 focus:ring-yellow-400 transition-all duration-300 transform hover:scale-105 animate-pulse"
                    >
                        <i class="fas fa-search mr-2"></i> Rechercher
                    </button>
                </form>
            </div>
        </div>

        <!-- Page Content -->
        <main class="main-content transition-all duration-300 ease-in-out py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
        
        <!-- Footer -->
        @include('layouts.footer')
        
        <!-- Bouton de service client flottant -->
        <div class="fixed top-20 left-6 z-50">
            <button id="serviceClientButton" class="flex items-center justify-center w-14 h-14 rounded-full bg-gradient-to-r from-green-500 to-teal-600 text-white shadow-2xl hover:from-green-600 hover:to-teal-700 focus:outline-none focus:ring-4 focus:ring-green-500 transition-all duration-300 transform hover:scale-110">
                <i class="fas fa-headset text-xl"></i>
            </button>
        </div>
        
        <!-- Bouton de chat flottant -->
        <div class="fixed bottom-44 right-6 z-50">
            <a href="{{ route('chat.index') }}" class="flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-2xl hover:from-blue-600 hover:to-indigo-700 focus:outline-none focus:ring-4 focus:ring-blue-500 transition-all duration-300 transform hover:scale-110 animate-bounce">
                <i class="fas fa-comments text-2xl"></i>
            </a>
        </div>
        
        <!-- Bouton de feedback flottant -->
        <div class="fixed bottom-28 right-6 z-50">
            <button id="feedbackButton" class="flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 text-white shadow-2xl hover:from-yellow-500 hover:to-orange-600 focus:outline-none focus:ring-4 focus:ring-yellow-400 transition-all duration-300 transform hover:scale-110 animate-bounce">
                <i class="fas fa-comment-dots text-2xl"></i>
            </button>
        </div>
        
        <!-- Bouton Retour en haut -->
        <button id="backToTop" class="footer-back-to-top">
            <i class="fas fa-arrow-up"></i>
        </button>
        
        <!-- Modal de feedback (initiallement caché) -->
        <div id="feedbackModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Overlay -->
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-900 opacity-80"></div>
                </div>
                
                <!-- Contenu du modal -->
                <div class="inline-block align-bottom bg-gradient-to-br from-white to-gray-100 rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full animate__animated animate__zoomIn">
                    <div class="bg-white px-6 pt-6 pb-4 sm:p-8 sm:pb-6">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 sm:mx-0 sm:h-12 sm:w-12">
                                <i class="fas fa-comment-dots text-white text-2xl"></i>
                            </div>
                            <div class="mt-4 text-center sm:mt-0 sm:ml-6 sm:text-left w-full">
                                <h3 class="text-2xl leading-6 font-extrabold text-gray-900 mb-2">
                                    Votre avis nous intéresse
                                </h3>
                                <div class="mt-2">
                                    <p class="text-lg text-gray-600 mb-6">
                                        Aidez-nous à améliorer notre plateforme en partageant vos commentaires.
                                    </p>
                                    <form class="mt-4">
                                        <div class="mb-6">
                                            <label for="feedbackMessage" class="block text-lg font-bold text-gray-800 mb-2">Message</label>
                                            <textarea id="feedbackMessage" rows="4" class="mt-1 block w-full border-2 border-gray-300 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-lg" placeholder="Votre feedback..."></textarea>
                                        </div>
                                        <div class="mb-6">
                                            <label class="block text-lg font-bold text-gray-800 mb-2">Note</label>
                                            <div class="flex items-center mt-1">
                                                <!-- Étoiles de notation -->
                                                <div class="flex">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <button type="button" class="text-gray-300 hover:text-yellow-400 focus:outline-none transition-colors duration-300" data-rating="{{ $i }}">
                                                            <i class="fas fa-star text-3xl"></i>
                                                        </button>
                                                    @endfor
                                                </div>
                                                <input type="hidden" id="feedbackRating" value="0">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 sm:px-8 sm:flex sm:flex-row-reverse rounded-b-2xl">
                        <button type="button" id="submitFeedback" class="w-full inline-flex justify-center rounded-full border border-transparent shadow-lg px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-xl font-bold text-white hover:from-blue-700 hover:to-indigo-800 focus:outline-none focus:ring-4 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105 sm:ml-3 sm:w-auto">
                            <i class="fas fa-paper-plane mr-2"></i> Envoyer
                        </button>
                        <button type="button" id="cancelFeedback" class="mt-3 w-full inline-flex justify-center rounded-full border-2 border-gray-300 shadow-lg px-6 py-3 bg-white text-xl font-bold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 transition-all duration-300 transform hover:scale-105 sm:mt-0 sm:ml-3 sm:w-auto">
                            Annuler
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Script pour la fonctionnalité de feedback -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const feedbackButton = document.getElementById('feedbackButton');
            const feedbackModal = document.getElementById('feedbackModal');
            const cancelFeedback = document.getElementById('cancelFeedback');
            const submitFeedback = document.getElementById('submitFeedback');
            const ratingButtons = document.querySelectorAll('[data-rating]');
            const feedbackRating = document.getElementById('feedbackRating');
            
            // Ouvrir le modal de feedback
            feedbackButton.addEventListener('click', function() {
                feedbackModal.classList.remove('hidden');
                // Ajouter un effet de chargement lors de l'ouverture
                feedbackModal.querySelector('.inline-block').classList.add('animate__animated', 'animate__zoomIn');
            });
            
            // Fermer le modal de feedback
            cancelFeedback.addEventListener('click', function() {
                feedbackModal.classList.add('hidden');
                // Retirer les classes d'animation
                feedbackModal.querySelector('.inline-block').classList.remove('animate__animated', 'animate__zoomIn');
            });
            
            // Fermer le modal en cliquant en dehors
            window.addEventListener('click', function(event) {
                if (event.target === feedbackModal) {
                    feedbackModal.classList.add('hidden');
                    // Retirer les classes d'animation
                    feedbackModal.querySelector('.inline-block').classList.remove('animate__animated', 'animate__zoomIn');
                }
            });
            
            // Gestion des étoiles de notation
            ratingButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const rating = this.getAttribute('data-rating');
                    feedbackRating.value = rating;
                    
                    // Mettre à jour l'apparence des étoiles
                    ratingButtons.forEach((btn, index) => {
                        const icon = btn.querySelector('i');
                        if (index < rating) {
                            icon.classList.remove('text-gray-300');
                            icon.classList.add('text-yellow-400', 'animate__animated', 'animate__pulse');
                        } else {
                            icon.classList.remove('text-yellow-400', 'animate__animated', 'animate__pulse');
                            icon.classList.add('text-gray-300');
                        }
                    });
                });
            });
            
            // Soumettre le feedback (simulation)
            submitFeedback.addEventListener('click', function() {
                const message = document.getElementById('feedbackMessage').value;
                const rating = feedbackRating.value;
                
                if (message.trim() !== '' && rating > 0) {
                    // Simuler un effet de chargement
                    submitFeedback.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Envoi en cours...';
                    submitFeedback.disabled = true;
                    
                    // Simuler un délai de traitement
                    setTimeout(function() {
                        // Ici, vous pouvez envoyer le feedback à votre backend
                        alert('Merci pour votre feedback !');
                        feedbackModal.classList.add('hidden');
                        document.getElementById('feedbackMessage').value = '';
                        feedbackRating.value = '0';
                        
                        // Réinitialiser les étoiles
                        ratingButtons.forEach(btn => {
                            const icon = btn.querySelector('i');
                            icon.classList.remove('text-yellow-400', 'animate__animated', 'animate__pulse');
                            icon.classList.add('text-gray-300');
                        });
                        
                        // Réinitialiser le bouton
                        submitFeedback.innerHTML = '<i class="fas fa-paper-plane mr-2"></i> Envoyer';
                        submitFeedback.disabled = false;
                        
                        // Retirer les classes d'animation du modal
                        feedbackModal.querySelector('.inline-block').classList.remove('animate__animated', 'animate__zoomIn');
                    }, 2000);
                } else {
                    alert('Veuillez remplir tous les champs.');
                }
            });
            
            // Bouton Retour en haut
            const backToTopButton = document.getElementById('backToTop');
            
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.add('visible');
                } else {
                    backToTopButton.classList.remove('visible');
                }
            });
            
            backToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
            
            // Bouton de service client
            const serviceClientButton = document.getElementById('serviceClientButton');
            
            serviceClientButton.addEventListener('click', function() {
                // Afficher une alerte avec les coordonnées du service client
                alert('Service Client TAFF\n\nTéléphone : +225 07 672 942 55\nTéléphone : +225 07 779 695 75\nEmail : dickoadama08@gmail.com\nEmail : sidikibamba278@gmail.com\n\nDisponible du lundi au vendredi de 8h à 18h\nSamedi de 9h à 12h');
            });
        });
    </script>
</body>
</html>