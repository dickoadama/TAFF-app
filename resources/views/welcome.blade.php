@extends('layouts.app')

@section('content')
<div class="page-background bg-btp">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-12 text-white animate__animated animate__fadeInDown">
            Bienvenue sur TAFF - Services spécialisés
        </h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Carte BTP -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-btp rounded-lg mb-4">BTP</div>
                <h2 class="text-2xl font-bold mb-2">BTP</h2>
                <p class="mb-4">Services de construction, rénovation et maintenance du bâtiment.</p>
                <a href="#" class="btn-primary inline-block">En savoir plus</a>
            </div>
            
            <!-- Carte Maintenance -->
            <div class="card animated-card category-maintenance rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-maintenance rounded-lg mb-4">Maintenance</div>
                <h2 class="text-2xl font-bold mb-2">Maintenance</h2>
                <p class="mb-4">Services de maintenance industrielle et résidentielle.</p>
                <a href="#" class="btn-primary inline-block">En savoir plus</a>
            </div>
            
            <!-- Carte Informatique -->
            <div class="card animated-card category-informatique rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-informatique rounded-lg mb-4">Informatique</div>
                <h2 class="text-2xl font-bold mb-2">Informatique</h2>
                <p class="mb-4">Solutions informatiques pour entreprises et particuliers.</p>
                <a href="#" class="btn-primary inline-block">En savoir plus</a>
            </div>
            
            <!-- Carte Caméras -->
            <div class="card animated-card category-camera rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-camera rounded-lg mb-4">Caméra</div>
                <h2 class="text-2xl font-bold mb-2">Caméras de surveillance</h2>
                <p class="mb-4">Installation et maintenance de systèmes de sécurité.</p>
                <a href="#" class="btn-primary inline-block">En savoir plus</a>
            </div>
            
            <!-- Carte Logiciels -->
            <div class="card animated-card category-logiciel rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-logiciel rounded-lg mb-4">Logiciel</div>
                <h2 class="text-2xl font-bold mb-2">Logiciels</h2>
                <p class="mb-4">Développement et personnalisation de logiciels sur mesure.</p>
                <a href="#" class="btn-primary inline-block">En savoir plus</a>
            </div>
            
            <!-- Carte Applications -->
            <div class="card animated-card category-application rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-application rounded-lg mb-4">Application</div>
                <h2 class="text-2xl font-bold mb-2">Applications</h2>
                <p class="mb-4">Création d'applications mobiles et web innovantes.</p>
                <a href="#" class="btn-primary inline-block">En savoir plus</a>
            </div>
            
            <!-- Carte Sites Internet -->
            <div class="card animated-card category-site-internet rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-site-internet rounded-lg mb-4">Site Internet</div>
                <h2 class="text-2xl font-bold mb-2">Sites Internet</h2>
                <p class="mb-4">Conception et développement de sites web professionnels.</p>
                <a href="#" class="btn-primary inline-block">En savoir plus</a>
            </div>
            
            <!-- Carte Piratage -->
            <div class="card animated-card category-piratage rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-piratage rounded-lg mb-4">Piratage</div>
                <h2 class="text-2xl font-bold mb-2">Piratage informatique</h2>
                <p class="mb-4">Services d'audit de sécurité et tests d'intrusion.</p>
                <a href="#" class="btn-primary inline-block">En savoir plus</a>
            </div>
            
            <!-- Carte Hacking -->
            <div class="card animated-card category-hacking rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-hacking rounded-lg mb-4">Hacking</div>
                <h2 class="text-2xl font-bold mb-2">Hacking éthique</h2>
                <p class="mb-4">Formation et sensibilisation à la cybersécurité.</p>
                <a href="#" class="btn-primary inline-block">En savoir plus</a>
            </div>
        </div>
    </div>
</div>
@endsection