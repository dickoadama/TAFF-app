@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Colonne principale du chat -->
        <div class="md:w-3/4">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- En-tête du chat -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-comments fa-2x mr-4"></i>
                            <div>
                                <h1 class="text-2xl font-bold">Chat Support</h1>
                                <p class="text-blue-200">Nous sommes là pour vous aider</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                            <span class="text-sm">En ligne</span>
                        </div>
                    </div>
                </div>
                
                <!-- Zone des messages -->
                <div id="chat-messages" class="h-96 overflow-y-auto p-6 bg-gray-50">
                    <!-- Message du support -->
                    <div class="flex mb-6">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                            <i class="fas fa-robot text-blue-600"></i>
                        </div>
                        <div class="bg-white rounded-lg p-4 shadow-sm max-w-3/4">
                            <div class="flex items-center mb-1">
                                <span class="font-bold text-gray-800">Support TAFF</span>
                                <span class="text-xs text-gray-500 ml-2">10:00</span>
                            </div>
                            <p class="text-gray-700">Bonjour ! Bienvenue sur le chat de support TAFF. Comment pouvons-nous vous aider aujourd'hui ?</p>
                        </div>
                    </div>
                    
                    <!-- Message de l'utilisateur -->
                    <div class="flex justify-end mb-6">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-lg p-4 shadow-sm max-w-3/4 text-white">
                            <div class="flex items-center justify-end mb-1">
                                <span class="text-xs text-blue-100 mr-2">10:02</span>
                                <span class="font-bold">Vous</span>
                            </div>
                            <p>Bonjour, j'aimerais savoir comment fonctionne le service de mise en relation avec les artisans.</p>
                        </div>
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center ml-3">
                            <i class="fas fa-user text-gray-600"></i>
                        </div>
                    </div>
                    
                    <!-- Message du support -->
                    <div class="flex mb-6">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                            <i class="fas fa-robot text-blue-600"></i>
                        </div>
                        <div class="bg-white rounded-lg p-4 shadow-sm max-w-3/4">
                            <div class="flex items-center mb-1">
                                <span class="font-bold text-gray-800">Support TAFF</span>
                                <span class="text-xs text-gray-500 ml-2">10:03</span>
                            </div>
                            <p class="text-gray-700">Notre service de mise en relation est simple : vous décrivez votre projet, nous trouvons les artisans qualifiés dans votre région, et nous vous mettons en contact. Vous recevez ensuite plusieurs devis pour choisir celui qui vous convient le mieux.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Zone de saisie -->
                <div class="border-t border-gray-200 p-6 bg-white">
                    <div class="flex">
                        <input 
                            type="text" 
                            id="message-input" 
                            placeholder="Tapez votre message..." 
                            class="flex-1 border border-gray-300 rounded-l-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                        <button 
                            id="send-button" 
                            class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-3 rounded-r-lg hover:from-blue-600 hover:to-blue-800 transition-all duration-300 flex items-center"
                        >
                            <i class="fas fa-paper-plane mr-2"></i> Envoyer
                        </button>
                    </div>
                    <div class="mt-3 text-sm text-gray-500 flex items-center">
                        <i class="fas fa-lock mr-2"></i> Vos conversations sont sécurisées et privées
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Colonne latérale d'informations -->
        <div class="md:w-1/4">
            <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Informations utiles</h2>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-clock text-blue-500 mt-1 mr-3"></i>
                        <span class="text-gray-600">Réponse sous 24h</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-user-tie text-blue-500 mt-1 mr-3"></i>
                        <span class="text-gray-600">Experts qualifiés</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-shield-alt text-blue-500 mt-1 mr-3"></i>
                        <span class="text-gray-600">Service sécurisé</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-headset text-blue-500 mt-1 mr-3"></i>
                        <span class="text-gray-600">Support 7j/7</span>
                    </li>
                </ul>
            </div>
            
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-xl shadow-lg p-6 text-white">
                <h2 class="text-xl font-bold mb-3">Besoin d'aide immédiate ?</h2>
                <p class="mb-4">Appelez notre service client</p>
                <div class="text-2xl font-bold mb-4">01 23 45 67 89</div>
                <p class="text-blue-100 text-sm">Du lundi au vendredi, 9h-18h</p>
            </div>
        </div>
    </div>
</div>

<!-- Script pour la fonctionnalité du chat -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const messageInput = document.getElementById('message-input');
    const sendButton = document.getElementById('send-button');
    const chatMessages = document.getElementById('chat-messages');
    
    // Fonction pour envoyer un message
    function sendMessage() {
        const message = messageInput.value.trim();
        if (message) {
            // Ajouter le message de l'utilisateur
            const now = new Date();
            const timeString = now.getHours() + ':' + (now.getMinutes() < 10 ? '0' : '') + now.getMinutes();
            
            const messageElement = document.createElement('div');
            messageElement.className = 'flex justify-end mb-6';
            messageElement.innerHTML = `
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-lg p-4 shadow-sm max-w-3/4 text-white">
                    <div class="flex items-center justify-end mb-1">
                        <span class="text-xs text-blue-100 mr-2">${timeString}</span>
                        <span class="font-bold">Vous</span>
                    </div>
                    <p>${message}</p>
                </div>
                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center ml-3">
                    <i class="fas fa-user text-gray-600"></i>
                </div>
            `;
            
            chatMessages.appendChild(messageElement);
            messageInput.value = '';
            
            // Simuler une réponse du support après un court délai
            setTimeout(() => {
                const responseElement = document.createElement('div');
                responseElement.className = 'flex mb-6';
                responseElement.innerHTML = `
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                        <i class="fas fa-robot text-blue-600"></i>
                    </div>
                    <div class="bg-white rounded-lg p-4 shadow-sm max-w-3/4">
                        <div class="flex items-center mb-1">
                            <span class="font-bold text-gray-800">Support TAFF</span>
                            <span class="text-xs text-gray-500 ml-2">${timeString}</span>
                        </div>
                        <p class="text-gray-700">Merci pour votre message. Notre équipe vous répondra dans les plus brefs délais.</p>
                    </div>
                `;
                
                chatMessages.appendChild(responseElement);
                // Faire défiler vers le bas
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 1000);
            
            // Faire défiler vers le bas
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    }
    
    // Événements
    sendButton.addEventListener('click', sendMessage);
    
    messageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
});
</script>
@endsection