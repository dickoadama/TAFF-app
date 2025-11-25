@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Exemples d'artisans par secteur</h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Découvrez la diversité des artisans qualifiés disponibles sur TAFF dans différents domaines d'expertise
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Secteur Bâtiment -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-xl">
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-6">
                <h2 class="text-2xl font-bold text-white"><i class="fas fa-hard-hat mr-3"></i>Bâtiment</h2>
            </div>
            <div class="p-6">
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-blue-500 mr-3"></i>
                        <span class="text-gray-700">Charpentier</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-blue-500 mr-3"></i>
                        <span class="text-gray-700">Couvreur</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-blue-500 mr-3"></i>
                        <span class="text-gray-700">Plombier</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-blue-500 mr-3"></i>
                        <span class="text-gray-700">Électricien</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-blue-500 mr-3"></i>
                        <span class="text-gray-700">Maçon</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-blue-500 mr-3"></i>
                        <span class="text-gray-700">Peintre en bâtiment</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-blue-500 mr-3"></i>
                        <span class="text-gray-700">Carreleur</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Secteur Services -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-xl">
            <div class="bg-gradient-to-r from-green-500 to-teal-600 p-6">
                <h2 class="text-2xl font-bold text-white"><i class="fas fa-concierge-bell mr-3"></i>Services</h2>
            </div>
            <div class="p-6">
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-green-500 mr-3"></i>
                        <span class="text-gray-700">Coiffeur</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-green-500 mr-3"></i>
                        <span class="text-gray-700">Esthéticienne</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-green-500 mr-3"></i>
                        <span class="text-gray-700">Fleuriste</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-green-500 mr-3"></i>
                        <span class="text-gray-700">Garagiste</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-green-500 mr-3"></i>
                        <span class="text-gray-700">Carrossier</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-green-500 mr-3"></i>
                        <span class="text-gray-700">Couturier</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Secteur Alimentation -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-xl">
            <div class="bg-gradient-to-r from-amber-500 to-orange-600 p-6">
                <h2 class="text-2xl font-bold text-white"><i class="fas fa-utensils mr-3"></i>Alimentation</h2>
            </div>
            <div class="p-6">
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-amber-500 mr-3"></i>
                        <span class="text-gray-700">Boucher</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-amber-500 mr-3"></i>
                        <span class="text-gray-700">Boulanger</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-amber-500 mr-3"></i>
                        <span class="text-gray-700">Pâtissier</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-amber-500 mr-3"></i>
                        <span class="text-gray-700">Charcutier-traiteur</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-amber-500 mr-3"></i>
                        <span class="text-gray-700">Chocolatier-confiseur</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-amber-500 mr-3"></i>
                        <span class="text-gray-700">Glacier</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Secteur Fabrication -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-xl">
            <div class="bg-gradient-to-r from-purple-500 to-pink-600 p-6">
                <h2 class="text-2xl font-bold text-white"><i class="fas fa-tools mr-3"></i>Fabrication</h2>
            </div>
            <div class="p-6">
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-purple-500 mr-3"></i>
                        <span class="text-gray-700">Ébéniste</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-purple-500 mr-3"></i>
                        <span class="text-gray-700">Maroquinier</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-purple-500 mr-3"></i>
                        <span class="text-gray-700">Potier-céramiste</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-purple-500 mr-3"></i>
                        <span class="text-gray-700">Horloger</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-purple-500 mr-3"></i>
                        <span class="text-gray-700">Tapissier</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-purple-500 mr-3"></i>
                        <span class="text-gray-700">Luthier</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-purple-500 mr-3"></i>
                        <span class="text-gray-700">Orfèvre</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-purple-500 mr-3"></i>
                        <span class="text-gray-700">Verrier</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-circle-right text-purple-500 mr-3"></i>
                        <span class="text-gray-700">Plombier</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mt-12 text-center">
        <a href="{{ route('artisans.index') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
            <i class="fas fa-search mr-2"></i> Trouver un artisan
        </a>
    </div>
</div>
@endsection