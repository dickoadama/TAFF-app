<nav class="bg-gradient-to-r from-blue-700 via-indigo-800 to-purple-900 border-b-2 border-yellow-400 shadow-xl">
    <style>
        .hide-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;  /* Chrome, Safari and Opera */
        }
        
        /* Animation pour les liens de navigation */
        .nav-link-animate {
            position: relative;
            overflow: hidden;
        }
        
        .nav-link-animate::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }
        
        .nav-link-animate:hover::before {
            left: 100%;
        }
        
        /* Animation pour le logo */
        .logo-animate {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }
    </style>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <!-- Logo et nom de l'application à gauche -->
            <div class="flex-shrink-0 flex items-center mr-auto">
                <a href="{{ route('home') }}" class="flex items-center logo-animate">
                    <x-application-logo class="block h-12 w-auto" />
                    <span class="ml-3 text-2xl font-bold text-yellow-300 hidden sm:block tracking-wider drop-shadow-lg">
                        TAFF<span class="text-white">.APP</span>
                    </span>
                </a>
            </div>
            
            <!-- Liens de navigation centrés -->
            <div class="hidden md:flex md:items-center md:justify-center flex-1 mx-4">
                @auth
                <div class="flex md:space-x-2 lg:space-x-3 xl:space-x-4">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="nav-link-animate text-yellow-300 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded-lg font-bold transition duration-300 transform hover:scale-110 uppercase tracking-wider shadow-md hover:shadow-yellow-400/30">
                        {{ __('Accueil') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('artisans.index')" :active="request()->routeIs('artisans.*')" class="nav-link-animate text-yellow-300 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded-lg font-bold transition duration-300 transform hover:scale-110 uppercase tracking-wider shadow-md hover:shadow-yellow-400/30">
                        {{ __('Artisans') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('service-categories.index')" :active="request()->routeIs('service-categories.*')" class="nav-link-animate text-yellow-300 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded-lg font-bold transition duration-300 transform hover:scale-110 uppercase tracking-wider shadow-md hover:shadow-yellow-400/30">
                        {{ __('Catégories') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('service-requests.index')" :active="request()->routeIs('service-requests.*')" class="nav-link-animate text-yellow-300 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded-lg font-bold transition duration-300 transform hover:scale-110 uppercase tracking-wider shadow-md hover:shadow-yellow-400/30">
                        {{ __('Demandes') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('quotes.index')" :active="request()->routeIs('quotes.*')" class="nav-link-animate text-yellow-300 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded-lg font-bold transition duration-300 transform hover:scale-110 uppercase tracking-wider shadow-md hover:shadow-yellow-400/30">
                        {{ __('Devis') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('invoices.index')" :active="request()->routeIs('invoices.*')" class="nav-link-animate text-yellow-300 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded-lg font-bold transition duration-300 transform hover:scale-110 uppercase tracking-wider shadow-md hover:shadow-yellow-400/30">
                        {{ __('Factures') }}
                    </x-nav-link>
                </div>
                @endauth
            </div>
            
            <!-- Zone de recherche et profil à droite -->
            <div class="flex items-center space-x-4 ml-auto">
                <!-- Icônes de réseaux sociaux stylisées -->
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="#" class="text-white hover:text-blue-600 transition-all duration-300 transform hover:scale-110 bg-blue-700 bg-opacity-30 backdrop-blur-sm rounded-full w-10 h-10 flex items-center justify-center shadow-lg hover:shadow-xl">
                        <i class="fab fa-facebook-f text-lg"></i>
                    </a>
                    <a href="#" class="text-white hover:text-blue-400 transition-all duration-300 transform hover:scale-110 bg-blue-700 bg-opacity-30 backdrop-blur-sm rounded-full w-10 h-10 flex items-center justify-center shadow-lg hover:shadow-xl">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    <a href="#" class="text-white hover:text-pink-500 transition-all duration-300 transform hover:scale-110 bg-blue-700 bg-opacity-30 backdrop-blur-sm rounded-full w-10 h-10 flex items-center justify-center shadow-lg hover:shadow-xl">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                    <a href="#" class="text-white hover:text-blue-800 transition-all duration-300 transform hover:scale-110 bg-blue-700 bg-opacity-30 backdrop-blur-sm rounded-full w-10 h-10 flex items-center justify-center shadow-lg hover:shadow-xl">
                        <i class="fab fa-linkedin-in text-lg"></i>
                    </a>
                </div>
                
                <!-- Profil utilisateur -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-bold text-yellow-300 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded-full transition duration-300 transform hover:scale-105 shadow-lg hover:shadow-yellow-400/30">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center shadow-md">
                                    <span class="text-white font-bold text-lg">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</span>
                                </div>
                                <span class="ml-2 hidden lg:inline font-bold">{{ Auth::user()->name ?? 'Invité' }}</span>
                                <svg class="ml-1 h-5 w-5 text-yellow-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-3 border-b-2 border-yellow-400 bg-gradient-to-r from-blue-50 to-indigo-50">
                                <p class="text-sm font-bold text-gray-900">{{ Auth::user()->name ?? 'Invité' }}</p>
                                <p class="text-xs text-gray-600">{{ Auth::user()->email ?? '' }}</p>
                            </div>
                            
                            <!-- Liens de profil -->
                            <div class="py-1 bg-white">
                                <x-dropdown-link :href="route('dashboard')" class="hover:bg-gradient-to-r from-blue-50 to-indigo-50 font-bold">
                                    {{ __('Tableau de bord') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('profile.edit')" class="hover:bg-gradient-to-r from-blue-50 to-indigo-50 font-bold">
                                    {{ __('PARAMETTRE') }}
                                </x-dropdown-link>
                            </div>
                            
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="hover:bg-red-50 font-bold text-red-600">
                                    {{ __('Déconnexion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
        
        <!-- Barre de navigation horizontale pour mobile - toujours visible quand connecté -->
        @auth
        <div class="md:hidden flex overflow-x-auto py-3 hide-scrollbar -mx-4 px-4 bg-black bg-opacity-20 rounded-lg my-2">
            <div class="flex space-x-2 flex-nowrap">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="nav-link-animate text-yellow-300 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded-lg font-bold whitespace-nowrap transition duration-300 transform hover:scale-105 uppercase tracking-wide shadow hover:shadow-yellow-400/30">
                    {{ __('Accueil') }}
                </x-nav-link>
                
                <x-nav-link :href="route('artisans.index')" :active="request()->routeIs('artisans.*')" class="nav-link-animate text-yellow-300 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded-lg font-bold whitespace-nowrap transition duration-300 transform hover:scale-105 uppercase tracking-wide shadow hover:shadow-yellow-400/30">
                    {{ __('Artisans') }}
                </x-nav-link>
                
                <x-nav-link :href="route('service-categories.index')" :active="request()->routeIs('service-categories.*')" class="nav-link-animate text-yellow-300 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded-lg font-bold whitespace-nowrap transition duration-300 transform hover:scale-105 uppercase tracking-wide shadow hover:shadow-yellow-400/30">
                    {{ __('Catégories') }}
                </x-nav-link>
                
                <x-nav-link :href="route('service-requests.index')" :active="request()->routeIs('service-requests.*')" class="nav-link-animate text-yellow-300 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded-lg font-bold whitespace-nowrap transition duration-300 transform hover:scale-105 uppercase tracking-wide shadow hover:shadow-yellow-400/30">
                    {{ __('Demandes') }}
                </x-nav-link>
                
                <x-nav-link :href="route('quotes.index')" :active="request()->routeIs('quotes.*')" class="nav-link-animate text-yellow-300 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded-lg font-bold whitespace-nowrap transition duration-300 transform hover:scale-105 uppercase tracking-wide shadow hover:shadow-yellow-400/30">
                    {{ __('Devis') }}
                </x-nav-link>
                
                <x-nav-link :href="route('invoices.index')" :active="request()->routeIs('invoices.*')" class="nav-link-animate text-yellow-300 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded-lg font-bold whitespace-nowrap transition duration-300 transform hover:scale-105 uppercase tracking-wide shadow hover:shadow-yellow-400/30">
                    {{ __('Factures') }}
                </x-nav-link>
            </div>
        </div>
        @endauth
    </div>
</nav>