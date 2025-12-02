@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card">
        <div class="card-header">
            <h1 class="text-3xl font-bold text-gray-800">Nos Partenariats</h1>
        </div>
        <div class="card-body">
            <p class="text-gray-600 mb-6">
                Découvrez nos partenaires et collaborations stratégiques.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Partenaire 1 -->
                <div class="card">
                    <div class="card-header text-center">
                        <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 mx-auto flex items-center justify-center">
                            <i class="fas fa-building text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="font-bold text-xl text-gray-800 mt-4">Société Générale de Construction</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-gray-600 mb-4">Partenariat stratégique pour les projets de construction résidentielle et commerciale depuis 2018.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">Construction</span>
                            <span class="text-gray-500 text-sm">Partenaire depuis 2018</span>
                        </div>
                    </div>
                </div>
                
                <!-- Partenaire 2 -->
                <div class="card">
                    <div class="card-header text-center">
                        <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 mx-auto flex items-center justify-center">
                            <i class="fas fa-bolt text-2xl text-yellow-600"></i>
                        </div>
                        <h3 class="font-bold text-xl text-gray-800 mt-4">Énergie Électrique CI</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-gray-600 mb-4">Collaboration pour les installations électriques industrielles et résidentielles depuis 2019.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-yellow-600 font-medium">Électricité</span>
                            <span class="text-gray-500 text-sm">Partenaire depuis 2019</span>
                        </div>
                    </div>
                </div>
                
                <!-- Partenaire 3 -->
                <div class="card">
                    <div class="card-header text-center">
                        <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 mx-auto flex items-center justify-center">
                            <i class="fas fa-tint text-2xl text-purple-600"></i>
                        </div>
                        <h3 class="font-bold text-xl text-gray-800 mt-4">HydroService CI</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-gray-600 mb-4">Partenariat pour les solutions de plomberie et d'assainissement depuis 2020.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-purple-600 font-medium">Plomberie</span>
                            <span class="text-gray-500 text-sm">Partenaire depuis 2020</span>
                        </div>
                    </div>
                </div>
                
                <!-- Partenaire 4 -->
                <div class="card">
                    <div class="card-header text-center">
                        <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 mx-auto flex items-center justify-center">
                            <i class="fas fa-tree text-2xl text-green-600"></i>
                        </div>
                        <h3 class="font-bold text-xl text-gray-800 mt-4">Vert et Jardin</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-gray-600 mb-4">Collaboration pour les projets d'aménagement paysager et d'entretien des espaces verts depuis 2021.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-green-600 font-medium">Jardinage</span>
                            <span class="text-gray-500 text-sm">Partenaire depuis 2021</span>
                        </div>
                    </div>
                </div>
                
                <!-- Partenaire 5 -->
                <div class="card">
                    <div class="card-header text-center">
                        <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 mx-auto flex items-center justify-center">
                            <i class="fas fa-laptop text-2xl text-teal-600"></i>
                        </div>
                        <h3 class="font-bold text-xl text-gray-800 mt-4">TechSolutions CI</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-gray-600 mb-4">Partenariat technologique pour les solutions de domotique et d'automatisation depuis 2022.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-teal-600 font-medium">Technologie</span>
                            <span class="text-gray-500 text-sm">Partenaire depuis 2022</span>
                        </div>
                    </div>
                </div>
                
                <!-- Partenaire 6 -->
                <div class="card">
                    <div class="card-header text-center">
                        <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 mx-auto flex items-center justify-center">
                            <i class="fas fa-shield-alt text-2xl text-red-600"></i>
                        </div>
                        <h3 class="font-bold text-xl text-gray-800 mt-4">Sécurité Pro</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-gray-600 mb-4">Collaboration pour les systèmes de sécurité et de surveillance depuis 2020.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-red-600 font-medium">Sécurité</span>
                            <span class="text-gray-500 text-sm">Partenaire depuis 2020</span>
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