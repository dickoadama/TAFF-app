@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-500 hover:scale-105 animate__animated animate__fadeIn animate__delay-0.2s">
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-6 text-center">
            <h1 class="text-3xl font-bold text-white animate__animated animate__fadeInDown">Inscription</h1>
            <p class="text-blue-100 mt-2 animate__animated animate__fadeInUp animate__delay-0.3s">Créez un compte pour accéder à toutes nos fonctionnalités</p>
        </div>
        
        <div class="p-8">
            <form method="POST" action="{{ route('register.post') }}" class="space-y-6">
                @csrf
                
                <div class="animate__animated animate__fadeInLeft animate__delay-0.4s">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom complet</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="text" name="name" id="name" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 transform hover:scale-105" placeholder="Votre nom complet" required>
                    </div>
                </div>
                
                <div class="animate__animated animate__fadeInRight animate__delay-0.5s">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" name="email" id="email" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 transform hover:scale-105" placeholder="votre@email.com" required>
                    </div>
                </div>
                
                <div class="animate__animated animate__fadeInLeft animate__delay-0.6s">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="password" id="password" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 transform hover:scale-105" placeholder="••••••••" required>
                    </div>
                </div>
                
                <div class="animate__animated animate__fadeInRight animate__delay-0.7s">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirmer le mot de passe</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 transform hover:scale-105" placeholder="••••••••" required>
                    </div>
                </div>
                
                <div class="animate__animated animate__fadeInUp animate__delay-0.8s">
                    <div class="flex items-center">
                        <input type="checkbox" name="terms" id="terms" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            J'accepte les <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors duration-300 underline">conditions d'utilisation</a> et la <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors duration-300 underline">politique de confidentialité</a>
                        </label>
                    </div>
                </div>
                
                <div class="animate__animated animate__fadeIn animate__delay-0.9s">
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold py-3 px-6 rounded-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-user-plus mr-2"></i>S'inscrire
                    </button>
                </div>
            </form>
            
            <div class="mt-8 text-center animate__animated animate__fadeInUp animate__delay-1s">
                <p class="text-gray-600">
                    Vous avez déjà un compte? 
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors duration-300 underline">Se connecter</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection