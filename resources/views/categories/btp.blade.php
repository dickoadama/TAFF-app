@extends('layouts.app')

@section('content')
<div class="page-background bg-btp">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-12 text-white animate__animated animate__fadeInDown">
            Services BTP
        </h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Carte Maçonnerie -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-btp rounded-lg mb-4">BTP</div>
                <h2 class="text-2xl font-bold mb-2">Maçonnerie</h2>
                <p class="mb-4">Construction, rénovation et réparation de structures en maçonnerie.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Charpente -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-btp rounded-lg mb-4">BTP</div>
                <h2 class="text-2xl font-bold mb-2">Charpente</h2>
                <p class="mb-4">Fabrication et pose de charpentes en bois ou métalliques.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Plomberie -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-btp rounded-lg mb-4">BTP</div>
                <h2 class="text-2xl font-bold mb-2">Plomberie</h2>
                <p class="mb-4">Installation et réparation de systèmes de plomberie.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Électricité -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-btp rounded-lg mb-4">BTP</div>
                <h2 class="text-2xl font-bold mb-2">Électricité</h2>
                <p class="mb-4">Installation électrique, rénovation et dépannage.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Peinture -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-btp rounded-lg mb-4">BTP</div>
                <h2 class="text-2xl font-bold mb-2">Peinture</h2>
                <p class="mb-4">Rénovation et décoration intérieure et extérieure.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
            
            <!-- Carte Carrelage -->
            <div class="card animated-card category-btp rounded-lg p-6 shadow-lg">
                <div class="placeholder-image placeholder-btp rounded-lg mb-4">BTP</div>
                <h2 class="text-2xl font-bold mb-2">Carrelage</h2>
                <p class="mb-4">Pose de carrelage, faïence et pierre naturelle.</p>
                <a href="#" class="btn-primary inline-block">Demander un devis</a>
            </div>
        </div>
    </div>
</div>
@endsection