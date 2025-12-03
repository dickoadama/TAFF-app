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
        
        /* Calendar and Clock Widgets */
        .widget-container {
            position: fixed;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        .calendar-container {
            top: 80px;
            right: 20px;
        }
        
        .clock-container {
            top: 20px;
            left: 20px;
        }
        
        .widget-toggle {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 8px 12px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .widget-toggle:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }
        
        .widget-content {
            display: none;
            margin-top: 10px;
        }
        
        .widget-content.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
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
                    <!-- Notification Bell Icon -->
                    <div class="relative mr-4">
                        <button id="notification-bell" class="text-white hover:text-yellow-300 transition-colors duration-300 p-2 rounded-full hover:bg-white hover:bg-opacity-20">
                            <i class="fas fa-bell text-xl"></i>
                            <span id="notification-count" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center hidden">0</span>
                        </button>
                    </div>
                    
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
    
    <!-- Calendar Widget Toggle -->
    <div class="widget-container calendar-container">
        <div class="widget-toggle" id="calendar-toggle">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="widget-content" id="calendar-content">
            @include('components.calendar-widget')
        </div>
    </div>
    
    <!-- Clock Widget Toggle -->
    <div class="widget-container clock-container">
        <div class="widget-toggle" id="clock-toggle">
            <i class="fas fa-clock"></i>
        </div>
        <div class="widget-content" id="clock-content">
            @include('components.clock-widget')
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarToggle = document.getElementById('calendar-toggle');
            const calendarContent = document.getElementById('calendar-content');
            const clockToggle = document.getElementById('clock-toggle');
            const clockContent = document.getElementById('clock-content');
            const notificationBell = document.getElementById('notification-bell');
            
            // Fetch unread notifications count
            function fetchUnreadNotifications() {
                fetch('/notifications/unread')
                    .then(response => response.json())
                    .then(notifications => {
                        const countElement = document.getElementById('notification-count');
                        const count = notifications.length;
                        
                        if (count > 0) {
                            countElement.textContent = count > 9 ? '9+' : count;
                            countElement.classList.remove('hidden');
                        } else {
                            countElement.classList.add('hidden');
                        }
                    })
                    .catch(error => console.error('Error fetching notifications:', error));
            }
            
            // Fetch notifications on page load
            fetchUnreadNotifications();
            
            // Refresh notifications every 30 seconds
            setInterval(fetchUnreadNotifications, 30000);
            
            // Toggle calendar visibility
            calendarToggle.addEventListener('click', function() {
                if (calendarContent.classList.contains('active')) {
                    // Hide calendar with exit animation
                    calendarContent.classList.remove('widget-enter');
                    calendarContent.classList.add('widget-exit');
                    setTimeout(() => {
                        calendarContent.classList.remove('active', 'widget-exit');
                    }, 200);
                } else {
                    // Show calendar with enter animation
                    calendarContent.classList.add('active', 'widget-enter');
                    // Close clock if open
                    if (clockContent.classList.contains('active')) {
                        clockContent.classList.remove('active', 'widget-enter');
                        clockContent.classList.add('widget-exit');
                        setTimeout(() => {
                            clockContent.classList.remove('widget-exit');
                        }, 200);
                    }
                }
            });
            
            // Toggle clock visibility
            clockToggle.addEventListener('click', function() {
                if (clockContent.classList.contains('active')) {
                    // Hide clock with exit animation
                    clockContent.classList.remove('widget-enter');
                    clockContent.classList.add('widget-exit');
                    setTimeout(() => {
                        clockContent.classList.remove('active', 'widget-exit');
                    }, 200);
                } else {
                    // Show clock with enter animation
                    clockContent.classList.add('active', 'widget-enter');
                    // Close calendar if open
                    if (calendarContent.classList.contains('active')) {
                        calendarContent.classList.remove('active', 'widget-enter');
                        calendarContent.classList.add('widget-exit');
                        setTimeout(() => {
                            calendarContent.classList.remove('widget-exit');
                        }, 200);
                    }
                }
            });
            
            // Toggle notifications dropdown
            notificationBell.addEventListener('click', function() {
                window.location.href = '/notifications';
            });
            
            // Close widgets when clicking elsewhere
            document.addEventListener('click', function(event) {
                if (!calendarToggle.contains(event.target) && !calendarContent.contains(event.target)) {
                    if (calendarContent.classList.contains('active')) {
                        calendarContent.classList.remove('widget-enter');
                        calendarContent.classList.add('widget-exit');
                        setTimeout(() => {
                            calendarContent.classList.remove('active', 'widget-exit');
                        }, 200);
                    }
                }
                
                if (!clockToggle.contains(event.target) && !clockContent.contains(event.target)) {
                    if (clockContent.classList.contains('active')) {
                        clockContent.classList.remove('widget-enter');
                        clockContent.classList.add('widget-exit');
                        setTimeout(() => {
                            clockContent.classList.remove('active', 'widget-exit');
                        }, 200);
                    }
                }
            });
        });
    </script>
</nav>