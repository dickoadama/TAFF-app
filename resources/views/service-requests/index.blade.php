@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Mes demandes de service</h1>
        <a href="{{ route('service-requests.create') }}" class="btn-primary">
            <i class="fas fa-plus mr-2"></i>Nouvelle demande
        </a>
    </div>
    
    <p class="text-gray-600 mb-8">
        Consultez ici toutes vos demandes de service envoyées aux artisans.
    </p>
    
    @if($serviceRequests->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($serviceRequests as $request)
        <div class="card animate__animated animate__fadeInUp animate__delay-{{ ($loop->index % 3) * 200 }}ms">
            <div class="card-header">
                <h2 class="font-bold text-lg truncate">{{ $request->title }}</h2>
            </div>
            <div class="card-body">
                <div class="space-y-3">
                    <div class="flex items-center">
                        <i class="fas fa-user text-blue-500 mr-2"></i>
                        <span class="font-medium">{{ $request->artisan->name }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <i class="fas fa-folder text-green-500 mr-2"></i>
                        <span>{{ $request->serviceCategory->name }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <i class="fas fa-calendar text-purple-500 mr-2"></i>
                        <span>
                            @if($request->preferred_date)
                                {{ \Carbon\Carbon::parse($request->preferred_date)->format('d/m/Y') }}
                            @else
                                Non spécifiée
                            @endif
                        </span>
                    </div>
                    
                    <div class="flex items-center">
                        <i class="fas fa-coins text-yellow-500 mr-2"></i>
                        <span>
                            @if($request->budget)
                                {{ number_format($request->budget, 0, ',', ' ') }} FCFA
                            @else
                                Non spécifié
                            @endif
                        </span>
                    </div>
                    
                    <div class="flex items-center">
                        <i class="fas fa-info-circle text-indigo-500 mr-2"></i>
                        <span class="badge 
                            @if($request->status == 'pending') badge-warning
                            @elseif($request->status == 'accepted') badge-success
                            @elseif($request->status == 'rejected') badge-danger
                            @else badge-secondary
                            @endif">
                            {{ ucfirst($request->status) }}
                        </span>
                    </div>
                </div>
                
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-gray-600 text-sm line-clamp-2">
                        {{ Str::limit($request->description, 100) }}
                    </p>
                </div>
                
                <div class="mt-4 flex justify-between items-center">
                    <span class="text-xs text-gray-500">
                        {{ $request->created_at->format('d/m/Y H:i') }}
                    </span>
                    <a href="{{ route('service-requests.show', $request) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        Voir détails
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="mt-8">
        {{ $serviceRequests->links() }}
    </div>
    @else
    <div class="card text-center py-12">
        <div class="text-gray-400 mb-4">
            <i class="fas fa-inbox text-5xl"></i>
        </div>
        <h3 class="text-xl font-medium text-gray-700 mb-2">Aucune demande de service</h3>
        <p class="text-gray-500 mb-6">
            Vous n'avez pas encore envoyé de demande de service aux artisans.
        </p>
        <a href="{{ route('service-requests.create') }}" class="btn-primary inline-block">
            <i class="fas fa-paper-plane mr-2"></i>Envoyer une demande
        </a>
    </div>
    @endif
</div>
@endsection