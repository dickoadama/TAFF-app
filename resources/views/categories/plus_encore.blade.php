@extends('layouts.app')

@section('content')
<div class="page-background bg-plus-encore">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-12 text-white animate__animated animate__fadeInDown">
            Et bien plus encore...
        </h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Carte Maintenance -->
            <div class="card animated-card category-maintenance rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/maintenance.jpg') }}" alt="Maintenance" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Maintenance Industrielle</h2>
                <p class="mb-4">Maintenance préventive et corrective pour équipements industriels et machines.</p>
                <a href="#" class="btn-primary inline-block">Demander un service</a>
            </div>
            
            <!-- Carte Nettoyage -->
            <div class="card animated-card category-nettoyage rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/nettoyage.jpg') }}" alt="Nettoyage" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Nettoyage Professionnel</h2>
                <p class="mb-4">Services de nettoyage pour bureaux, locaux commerciaux et espaces industriels.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Jardinage -->
            <div class="card animated-card category-jardinage rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/jardinage.jpg') }}" alt="Jardinage" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Jardinage & Paysagisme</h2>
                <p class="mb-4">Entretien de jardins, création d'espaces verts et aménagement paysager.</p>
                <a href="#" class="btn-primary inline-block">Demander un service</a>
            </div>
            
            <!-- Carte Transport -->
            <div class="card animated-card category-transport rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/transport.jpg') }}" alt="Transport" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Transport & Déménagement</h2>
                <p class="mb-4">Services de transport de marchandises et déménagement professionnel.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Événementiel -->
            <div class="card animated-card category-evenement rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/evenement.jpg') }}" alt="Événement" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Services Événementiels</h2>
                <p class="mb-4">Organisation d'événements, mariages, séminaires et fêtes privées.</p>
                <a href="#" class="btn-primary inline-block">Demander un service</a>
            </div>
            
            <!-- Carte Conseil -->
            <div class="card animated-card category-conseil rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/conseil.jpg') }}" alt="Conseil" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Conseil & Expertise</h2>
                <p class="mb-4">Conseil technique et expertise dans divers domaines professionnels.</p>
                <a href="#" class="btn-primary inline-block">Prendre rendez-vous</a>
            </div>
            
            <!-- Carte Électricité Industrielle -->
            <div class="card animated-card category-electricite rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/electricite.jpg') }}" alt="Électricité" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Électricité Industrielle</h2>
                <p class="mb-4">Installation et maintenance d'installations électriques industrielles.</p>
                <a href="#" class="btn-primary inline-block">Demander un service</a>
            </div>
            
            <!-- Carte Soudure -->
            <div class="card animated-card category-soudure rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/soudure.jpg') }}" alt="Soudure" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Soudure & Métallerie</h2>
                <p class="mb-4">Travail des métaux, soudure et fabrication de structures métalliques.</p>
                <a href="#" class="btn-primary inline-block">Demander un service</a>
            </div>
            
            <!-- Carte Climatisation -->
            <div class="card animated-card category-climatisation rounded-lg p-6 shadow-lg">
                <img src="{{ asset('images/placeholders/climatisation.jpg') }}" alt="Climatisation" class="rounded-lg mb-4 w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mb-2">Climatisation & Chauffage</h2>
                <p class="mb-4">Installation et maintenance de systèmes de chauffage et climatisation.</p>
                <a href="#" class="btn-primary inline-block">Demander un service</a>
            </div>
        </div>
        
        <div class="mt-12 text-center">
            <h2 class="text-3xl font-bold mb-6 text-white">Pourquoi choisir nos services "Et bien plus encore" ?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-6 shadow-lg">
                    <div class="text-4xl text-yellow-400 mb-4">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-white">Qualité Garantie</h3>
                    <p class="text-blue-100">Nous sélectionnons rigoureusement nos prestataires pour garantir un service de qualité supérieure.</p>
                </div>
                
                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-6 shadow-lg">
                    <div class="text-4xl text-yellow-400 mb-4">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-white">Disponibilité Rapide</h3>
                    <p class="text-blue-100">Nos artisans sont disponibles rapidement pour répondre à vos besoins urgents.</p>
                </div>
                
                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-6 shadow-lg">
                    <div class="text-4xl text-yellow-400 mb-4">
                        <i class="fas fa-euro-sign"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-white">Tarifs Compétitifs</h3>
                    <p class="text-blue-100">Comparez facilement les tarifs et trouvez le meilleur rapport qualité-prix.</p>
                </div>
            </div>
        </div>
        
        <div class="mt-12 text-center">
            <a href="{{ route('service-categories.index') }}" class="inline-block bg-gradient-to-r from-yellow-500 to-orange-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-folder mr-2"></i>Explorer toutes les catégories
            </a>
        </div>
    </div>
</div>
@endsection