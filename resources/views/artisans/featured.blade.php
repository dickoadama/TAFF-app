@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Artisans Vedettes</h1>
        <a href="{{ route('artisans.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Tous les artisans
        </a>
    </div>

    @if($featuredArtisans->isEmpty())
        <div class="card">
            <div class="card-body text-center">
                <p class="text-gray-600">Aucun artisan vedette disponible pour le moment.</p>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredArtisans as $artisan)
                <div class="card">
                    <div class="card-body">
                        <div class="flex items-start mb-4">
                            <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 flex items-center justify-center mr-4" />
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">{{ $artisan->name }}</h3>
                                @if($artisan->serviceCategory)
                                    <p class="text-sm text-gray-600">{{ $artisan->serviceCategory->name }}</p>
                                @endif
                            </div>
                        </div>
                        
                        @if($artisan->rating)
                            <div class="mb-3">
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $artisan->rating)
                                            <i class="fas fa-star text-yellow-400"></i>
                                        @else
                                            <i class="far fa-star text-gray-300"></i>
                                        @endif
                                    @endfor
                                    <span class="ml-2 text-sm text-gray-600">({{ $artisan->rating }}/5)</span>
                                </div>
                            </div>
                        @endif
                        
                        @if($artisan->skills)
                            <div class="mb-3">
                                <p class="text-sm"><span class="font-semibold">Compétences :</span> {{ $artisan->skills }}</p>
                            </div>
                        @endif
                        
                        @if($artisan->description)
                            <div class="mb-4">
                                <p class="text-gray-700 text-sm">{{ Str::limit($artisan->description, 100) }}</p>
                            </div>
                        @endif
                        
                        <div class="flex justify-between items-center">
                            <div>
                                @if($artisan->phone)
                                    <p class="text-sm text-gray-600"><i class="fas fa-phone mr-2"></i>{{ $artisan->phone }}</p>
                                @endif
                                @if($artisan->email)
                                    <p class="text-sm text-gray-600"><i class="fas fa-envelope mr-2"></i>{{ $artisan->email }}</p>
                                @endif
                            </div>
                            <a href="{{ route('artisans.show', $artisan) }}" class="btn-primary text-sm">
                                Voir détails
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection