@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Résultats de recherche pour "{{ $query }}"</h1>
        <p class="text-gray-600">Trouvé {{ $artisans->total() + $categories->total() + $serviceRequests->total() }} résultats</p>
    </div>

    <!-- Résultats pour les artisans -->
    @if($artisans->count() > 0)
    <div class="card mb-8">
        <div class="card-header">
            <h2 class="text-xl font-semibold">Artisans ({{ $artisans->total() }})</h2>
        </div>
        <div class="card-body">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($artisans as $artisan)
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-3">
                        <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-gray-500"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">{{ $artisan->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $artisan->serviceCategory->name ?? 'Catégorie non définie' }}</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ Str::limit($artisan->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-yellow-500">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $artisan->rating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </span>
                        <a href="{{ route('artisans.show', $artisan) }}" class="text-primary hover:underline text-sm">Voir détails</a>
                    </div>
                </div>
                @endforeach
            </div>
            
            @if($artisans->hasPages())
            <div class="mt-6">
                {{ $artisans->appends(['q' => $query])->links() }}
            </div>
            @endif
        </div>
    </div>
    @endif

    <!-- Résultats pour les catégories -->
    @if($categories->count() > 0)
    <div class="card mb-8">
        <div class="card-header">
            <h2 class="text-xl font-semibold">Catégories de service ({{ $categories->total() }})</h2>
        </div>
        <div class="card-body">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($categories as $category)
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-3">
                        <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                            <i class="fas fa-folder text-gray-500"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">{{ $category->name }}</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ Str::limit($category->description, 100) }}</p>
                    <div class="flex justify-end">
                        <a href="{{ route('service-categories.show', $category) }}" class="text-primary hover:underline text-sm">Voir détails</a>
                    </div>
                </div>
                @endforeach
            </div>
            
            @if($categories->hasPages())
            <div class="mt-6">
                {{ $categories->appends(['q' => $query])->links() }}
            </div>
            @endif
        </div>
    </div>
    @endif

    <!-- Résultats pour les demandes de service -->
    @if($serviceRequests->count() > 0)
    <div class="card">
        <div class="card-header">
            <h2 class="text-xl font-semibold">Demandes de service ({{ $serviceRequests->total() }})</h2>
        </div>
        <div class="card-body">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($serviceRequests as $request)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $request->title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $request->serviceCategory->name ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($request->status == 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($request->status == 'accepted') bg-blue-100 text-blue-800
                                    @elseif($request->status == 'in_progress') bg-indigo-100 text-indigo-800
                                    @elseif($request->status == 'completed') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800
                                    @endif">
                                    {{ ucfirst($request->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('service-requests.show', $request) }}" class="text-primary hover:text-secondary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if($serviceRequests->hasPages())
            <div class="mt-6">
                {{ $serviceRequests->appends(['q' => $query])->links() }}
            </div>
            @endif
        </div>
    </div>
    @endif

    <!-- Aucun résultat -->
    @if($artisans->count() == 0 && $categories->count() == 0 && $serviceRequests->count() == 0)
    <div class="text-center py-12">
        <i class="fas fa-search text-4xl text-gray-300 mb-4"></i>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun résultat trouvé</h3>
        <p class="text-gray-500 mb-4">Votre recherche pour "{{ $query }}" n'a donné aucun résultat.</p>
        <a href="{{ route('home') }}" class="btn-primary">
            <i class="fas fa-arrow-left mr-2"></i>Retour à l'accueil
        </a>
    </div>
    @endif
</div>
@endsection