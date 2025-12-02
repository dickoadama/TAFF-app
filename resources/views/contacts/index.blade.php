@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card">
        <div class="card-header">
            <h1 class="text-3xl font-bold text-gray-800">Contactez-nous</h1>
        </div>
        <div class="card-body">
            <p class="text-gray-600 mb-6">
                Contactez-nous pour toute question ou demande d'information.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Informations de contact -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Nos coordonnées</h2>
                    </div>
                    <div class="card-body">
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-blue-600 text-xl mt-1 mr-4"></i>
                                <div>
                                    <h3 class="font-bold text-lg text-gray-800">Adresse</h3>
                                    <p class="text-gray-600">Abidjan, Côte d'Ivoire</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-phone-alt text-green-600 text-xl mt-1 mr-4"></i>
                                <div>
                                    <h3 class="font-bold text-lg text-gray-800">Téléphone</h3>
                                    <p class="text-gray-600">+225 07 672 942 55</p>
                                    <p class="text-gray-600">+225 07 779 695 75</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-envelope text-purple-600 text-xl mt-1 mr-4"></i>
                                <div>
                                    <h3 class="font-bold text-lg text-gray-800">Email</h3>
                                    <p class="text-gray-600">dickoadama08@gmail.com</p>
                                    <p class="text-gray-600">sidikibamba278@gmail.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-clock text-amber-600 text-xl mt-1 mr-4"></i>
                                <div>
                                    <h3 class="font-bold text-lg text-gray-800">Horaires</h3>
                                    <p class="text-gray-600">Lundi - Vendredi : 8h00 - 18h00</p>
                                    <p class="text-gray-600">Samedi : 9h00 - 14h00</p>
                                    <p class="text-gray-600">Dimanche : Fermé</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Formulaire de contact -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Envoyez-nous un message</h2>
                    </div>
                    <div class="card-body">
                        <form class="space-y-4">
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Nom complet</label>
                                <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Votre nom">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                                <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="votre@email.com">
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-gray-700 font-medium mb-2">Sujet</label>
                                <input type="text" id="subject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Sujet de votre message">
                            </div>
                            
                            <div>
                                <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                                <textarea id="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Votre message..."></textarea>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                    <i class="fas fa-paper-plane mr-2"></i>Envoyer le message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Carte de localisation -->
            <div class="card mt-8">
                <div class="card-header">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Notre localisation</h2>
                </div>
                <div class="card-body">
                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-96 flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-map-marked-alt text-4xl text-blue-600 mb-4"></i>
                            <p class="text-gray-600">Carte de localisation interactive</p>
                            <p class="text-gray-500 text-sm mt-2">Abidjan, Côte d'Ivoire</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-full hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <i class="fas fa-arrow-left mr-2"></i>Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection