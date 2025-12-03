@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-gray-200">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-4 border-b-2 border-gray-200">
            <h1 class="text-2xl font-bold text-white">Messagerie</h1>
        </div>
        
        <div class="p-6">
            @if($conversations->count() > 0)
                <div class="space-y-4">
                    @foreach($conversations as $conversation)
                        @php
                            $otherUser = $conversation->otherParticipant(Auth::id());
                            $lastMessage = $conversation->messages->first();
                        @endphp
                        
                        <a href="{{ route('messaging.show', $conversation) }}" 
                           class="block bg-gray-50 rounded-xl p-4 border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300 hover:bg-blue-50">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-400 to-indigo-500 flex items-center justify-center">
                                        <span class="text-white font-bold text-lg">{{ substr($otherUser->name, 0, 1) }}</span>
                                    </div>
                                </div>
                                
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-bold text-gray-900">{{ $otherUser->name }}</h3>
                                        @if($lastMessage)
                                            <span class="text-sm text-gray-500">{{ $lastMessage->created_at->diffForHumans() }}</span>
                                        @endif
                                    </div>
                                    
                                    @if($lastMessage)
                                        <p class="mt-1 text-gray-600 truncate">
                                            @if($lastMessage->sender_id == Auth::id())
                                                <span class="font-bold">Vous :</span>
                                            @endif
                                            {{ Str::limit($lastMessage->content, 70) }}
                                        </p>
                                    @else
                                        <p class="mt-1 text-gray-500 italic">Aucun message</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-comments text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-gray-900">Aucune conversation</h3>
                    <p class="mt-2 text-gray-600">Vous n'avez aucune conversation pour le moment.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection