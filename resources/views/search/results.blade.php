@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Résultats de recherche pour "{{ $query }}"</h1>
        
        @if(empty($query))
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-700">
                            Veuillez entrer un terme de recherche pour trouver des artisans, catégories ou demandes de service.
                        </p>
                    </div>
                </div>
            </div>
        @else
            <!-- Résultats pour les artisans -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Artisans ({{ $artisans->count() }})</h2>
                
                @if($artisans->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($artisans as $artisan)
                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="h-12 w-12 rounded-full bg-indigo-100 flex items-center justify-center">
                                                <span class="text-indigo-800 font-bold">{{ substr($artisan->name, 0, 1) }}</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="text-lg font-medium text-gray-900">{{ $artisan->name }}</h3>
                                            <p class="text-sm text-gray-500">{{ $artisan->skills ?? 'Compétences non spécifiées' }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-sm text-gray-600">{{ Str::limit($artisan->description, 100) }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('artisans.show', $artisan) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                                            Voir le profil
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-gray-50 rounded-lg p-6 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun artisan trouvé</h3>
                        <p class="mt-1 text-sm text-gray-500">Aucun artisan ne correspond à votre recherche "{{ $query }}".</p>
                    </div>
                @endif
            </div>
            
            <!-- Résultats pour les catégories -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Catégories ({{ $categories->count() }})</h2>
                
                @if($categories->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($categories as $category)
                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-6">
                                    <h3 class="text-lg font-medium text-gray-900">{{ $category->name }}</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-600">{{ Str::limit($category->description, 100) }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('service-categories.show', $category) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                                            Voir les détails
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-gray-50 rounded-lg p-6 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Aucune catégorie trouvée</h3>
                        <p class="mt-1 text-sm text-gray-500">Aucune catégorie ne correspond à votre recherche "{{ $query }}".</p>
                    </div>
                @endif
            </div>
            
            <!-- Résultats pour les demandes de service -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Demandes de service ({{ $requests->count() }})</h2>
                
                @if($requests->count() > 0)
                    <div class="bg-white shadow overflow-hidden sm:rounded-md">
                        <ul class="divide-y divide-gray-200">
                            @foreach($requests as $request)
                                <li>
                                    <a href="{{ route('service-requests.show', $request) }}" class="block hover:bg-gray-50">
                                        <div class="px-4 py-4 sm:px-6">
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm font-medium text-indigo-600 truncate">{{ $request->title }}</p>
                                                <div class="ml-2 flex-shrink-0 flex">
                                                    <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $request->status ?? 'En attente' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="mt-2 sm:flex sm:justify-between">
                                                <div class="sm:flex">
                                                    <p class="flex items-center text-sm text-gray-500">
                                                        {{ Str::limit($request->description, 100) }}
                                                    </p>
                                                </div>
                                                <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                    </svg>
                                                    <p>
                                                        Posté le {{ $request->created_at->format('d/m/Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="bg-gray-50 rounded-lg p-6 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Aucune demande de service trouvée</h3>
                        <p class="mt-1 text-sm text-gray-500">Aucune demande de service ne correspond à votre recherche "{{ $query }}".</p>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>
@endsection