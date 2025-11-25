@extends('layouts.app')

@section('content')
<div class="page-background bg-camera">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-12 text-white animate__animated animate__fadeInDown">
            Sécurité et Surveillance
        </h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Carte Caméras -->
            <div class="card animated-card category-camera rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-camera rounded-lg mb-4">Caméra</div>
                <h2 class="text-2xl font-bold mb-2">Installation Caméras</h2>
                <p class="mb-4">Installation et configuration de systèmes de vidéosurveillance.</p>
                <a href="#" class="btn-primary inline-block">Demander une installation</a>
            </div>
            
            <!-- Carte Alarme -->
            <div class="card animated-card category-camera rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-camera rounded-lg mb-4">Caméra</div>
                <h2 class="text-2xl font-bold mb-2">Systèmes d'Alarme</h2>
                <p class="mb-4">Installation de systèmes d'alarme pour maisons et entreprises.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Contrôle d'accès -->
            <div class="card animated-card category-camera rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-camera rounded-lg mb-4">Caméra</div>
                <h2 class="text-2xl font-bold mb-2">Contrôle d'Accès</h2>
                <p class="mb-4">Systèmes de contrôle d'accès biométriques et par badge.</p>
                <a href="#" class="btn-primary inline-block">Demander une solution</a>
            </div>
            
            <!-- Carte Piratage Éthique -->
            <div class="card animated-card category-piratage rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-piratage rounded-lg mb-4">Piratage</div>
                <h2 class="text-2xl font-bold mb-2">Piratage Éthique</h2>
                <p class="mb-4">Tests d'intrusion et audit de sécurité informatique.</p>
                <a href="#" class="btn-primary inline-block">Demander un audit</a>
            </div>
            
            <!-- Carte Hacking Défensif -->
            <div class="card animated-card category-hacking rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-hacking rounded-lg mb-4">Hacking</div>
                <h2 class="text-2xl font-bold mb-2">Hacking Défensif</h2>
                <p class="mb-4">Formation et sensibilisation à la cybersécurité.</p>
                <a href="#" class="btn-primary inline-block">S'inscrire à une formation</a>
            </div>
            
            <!-- Carte Sécurité Réseau -->
            <div class="card animated-card category-piratage rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-piratage rounded-lg mb-4">Piratage</div>
                <h2 class="text-2xl font-bold mb-2">Sécurité Réseau</h2>
                <p class="mb-4">Protection et surveillance des réseaux d'entreprise.</p>
                <a href="#" class="btn-primary inline-block">Demander une solution</a>
            </div>
        </div>
    </div>
</div>
@endsection