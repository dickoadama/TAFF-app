@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-gray-200">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-4 border-b-2 border-gray-200">
            <h1 class="text-2xl font-bold text-white">Notifications</h1>
        </div>
        
        <div class="p-6">
            @if($notifications->count() > 0)
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">{{ $notifications->total() }} Notifications</h2>
                    <button id="markAllRead" class="bg-gradient-to-r from-green-500 to-teal-600 text-white font-bold py-2 px-4 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-check-double mr-2"></i>Marquer tout comme lu
                    </button>
                </div>
                
                <div class="space-y-4">
                    @foreach($notifications as $notification)
                        <div class="notification-item bg-gray-50 rounded-xl p-4 border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300 {{ $notification->is_read ? '' : 'bg-blue-50 border-blue-200' }}" 
                             data-id="{{ $notification->id }}">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    @if($notification->type === 'success')
                                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                                            <i class="fas fa-check-circle text-green-600"></i>
                                        </div>
                                    @elseif($notification->type === 'warning')
                                        <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                            <i class="fas fa-exclamation-circle text-yellow-600"></i>
                                        </div>
                                    @elseif($notification->type === 'error')
                                        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                            <i class="fas fa-times-circle text-red-600"></i>
                                        </div>
                                    @else
                                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                            <i class="fas fa-info-circle text-blue-600"></i>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-bold text-gray-900">{{ $notification->title }}</h3>
                                        <span class="text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                    
                                    <p class="mt-2 text-gray-700">{{ $notification->message }}</p>
                                    
                                    @if($notification->url)
                                        <a href="{{ $notification->url }}" class="mt-3 inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                            Voir les détails
                                            <i class="fas fa-arrow-right ml-1 text-sm"></i>
                                        </a>
                                    @endif
                                    
                                    @if(!$notification->is_read)
                                        <div class="mt-3 flex space-x-2">
                                            <button class="mark-read-btn bg-green-500 hover:bg-green-600 text-white text-sm font-bold py-1 px-3 rounded-full transition-colors duration-300" 
                                                    data-id="{{ $notification->id }}">
                                                <i class="fas fa-check mr-1"></i>Marquer comme lu
                                            </button>
                                            <button class="delete-btn bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-3 rounded-full transition-colors duration-300" 
                                                    data-id="{{ $notification->id }}">
                                                <i class="fas fa-trash mr-1"></i>Supprimer
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-8">
                    {{ $notifications->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-bell-slash text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-gray-900">Aucune notification</h3>
                    <p class="mt-2 text-gray-600">Vous n'avez aucune notification pour le moment.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Marquer une notification comme lue
    document.querySelectorAll('.mark-read-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            fetch(`/notifications/${id}/read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Masquer les boutons et changer le style
                    const notificationItem = document.querySelector(`.notification-item[data-id="${id}"]`);
                    notificationItem.classList.remove('bg-blue-50', 'border-blue-200');
                    notificationItem.querySelector('.mark-read-btn').closest('.flex').remove();
                }
            });
        });
    });
    
    // Supprimer une notification
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            if (confirm('Êtes-vous sûr de vouloir supprimer cette notification ?')) {
                fetch(`/notifications/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Supprimer l'élément du DOM
                        document.querySelector(`.notification-item[data-id="${id}"]`).remove();
                    }
                });
            }
        });
    });
    
    // Marquer toutes les notifications comme lues
    document.getElementById('markAllRead').addEventListener('click', function() {
        fetch('/notifications/read-all', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Recharger la page pour refléter les changements
                location.reload();
            }
        });
    });
});
</script>
@endsection