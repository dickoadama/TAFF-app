@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-gray-200">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="{{ route('messaging.index') }}" class="text-white hover:text-yellow-300 mr-4">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="text-2xl font-bold text-white">Conversation avec {{ $otherParticipant->name }}</h1>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <!-- Messages container -->
            <div id="messages-container" class="h-96 overflow-y-auto mb-6 bg-gray-50 rounded-xl p-4 border border-gray-200">
                @foreach($messages as $message)
                    <div class="mb-4 {{ $message->sender_id == Auth::id() ? 'text-right' : '' }}">
                        <div class="inline-block max-w-xs md:max-w-md {{ $message->sender_id == Auth::id() ? 'bg-blue-500 text-white rounded-l-xl rounded-tr-xl' : 'bg-gray-200 text-gray-800 rounded-r-xl rounded-tl-xl' }} p-3">
                            <p>{{ $message->content }}</p>
                            <div class="text-xs mt-1 {{ $message->sender_id == Auth::id() ? 'text-blue-100' : 'text-gray-500' }}">
                                {{ $message->created_at->format('H:i') }}
                                @if($message->sender_id == Auth::id())
                                    @if($message->is_read)
                                        <i class="fas fa-check-double text-blue-200 ml-1"></i>
                                    @else
                                        <i class="fas fa-check text-blue-200 ml-1"></i>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Message input -->
            <form id="message-form" class="flex">
                @csrf
                <input type="text" 
                       id="message-input" 
                       name="message" 
                       placeholder="Tapez votre message..." 
                       class="flex-1 border-2 border-gray-300 rounded-l-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       required>
                <button type="submit" 
                        class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold py-3 px-6 rounded-r-xl hover:from-blue-600 hover:to-indigo-700 transition-all duration-300">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const messageForm = document.getElementById('message-form');
    const messageInput = document.getElementById('message-input');
    const messagesContainer = document.getElementById('messages-container');
    
    // Scroll to bottom of messages
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
    
    // Handle form submission
    messageForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const message = messageInput.value.trim();
        if (message === '') return;
        
        // Send message via AJAX
        fetch('{{ route("messaging.store", $conversation) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ message: message })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Add message to UI
                const messageElement = document.createElement('div');
                messageElement.className = 'mb-4 text-right';
                messageElement.innerHTML = `
                    <div class="inline-block max-w-xs md:max-w-md bg-blue-500 text-white rounded-l-xl rounded-tr-xl p-3">
                        <p>${data.message.content}</p>
                        <div class="text-xs mt-1 text-blue-100">
                            ${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}
                            <i class="fas fa-check text-blue-200 ml-1"></i>
                        </div>
                    </div>
                `;
                
                messagesContainer.appendChild(messageElement);
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
                
                // Clear input
                messageInput.value = '';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Erreur lors de l\'envoi du message');
        });
    });
});
</script>
@endsection