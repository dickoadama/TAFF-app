<?php

namespace App\Services;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MessagingService
{
    /**
     * Créer ou récupérer une conversation entre deux utilisateurs
     *
     * @param User $user1
     * @param User $user2
     * @return Conversation
     */
    public function getOrCreateConversation(User $user1, User $user2)
    {
        // Vérifier si une conversation existe déjà
        $conversation = Conversation::where(function($query) use ($user1, $user2) {
            $query->where('user1_id', $user1->id)
                  ->where('user2_id', $user2->id);
        })->orWhere(function($query) use ($user1, $user2) {
            $query->where('user1_id', $user2->id)
                  ->where('user2_id', $user1->id);
        })->first();
        
        // Si aucune conversation n'existe, en créer une nouvelle
        if (!$conversation) {
            $conversation = Conversation::create([
                'user1_id' => $user1->id,
                'user2_id' => $user2->id,
                'is_active' => true
            ]);
        }
        
        return $conversation;
    }
    
    /**
     * Envoyer un message dans une conversation
     *
     * @param Conversation $conversation
     * @param User $sender
     * @param string $content
     * @return Message
     */
    public function sendMessage(Conversation $conversation, User $sender, string $content)
    {
        // Déterminer le destinataire
        $recipientId = $conversation->user1_id == $sender->id ? 
                       $conversation->user2_id : $conversation->user1_id;
        
        // Créer le message
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $sender->id,
            'recipient_id' => $recipientId,
            'content' => $content,
            'is_read' => false
        ]);
        
        return $message;
    }
    
    /**
     * Obtenir les conversations d'un utilisateur avec les derniers messages
     *
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUserConversationsWithLastMessage(User $user)
    {
        return Conversation::where('user1_id', $user->id)
            ->orWhere('user2_id', $user->id)
            ->with(['user1', 'user2', 'messages' => function($query) {
                $query->latest()->limit(1);
            }])
            ->get();
    }
    
    /**
     * Obtenir les messages d'une conversation
     *
     * @param Conversation $conversation
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getConversationMessages(Conversation $conversation, int $limit = 50)
    {
        return $conversation->messages()
            ->with('sender')
            ->latest()
            ->limit($limit)
            ->get()
            ->reverse(); // Inverser pour avoir l'ordre chronologique
    }
    
    /**
     * Marquer tous les messages d'une conversation comme lus
     *
     * @param Conversation $conversation
     * @param User $user
     * @return void
     */
    public function markConversationAsRead(Conversation $conversation, User $user)
    {
        Message::where('conversation_id', $conversation->id)
            ->where('recipient_id', $user->id)
            ->where('is_read', false)
            ->update([
                'is_read' => true,
                'read_at' => now()
            ]);
    }
    
    /**
     * Obtenir le nombre de messages non lus pour un utilisateur
     *
     * @param User $user
     * @return int
     */
    public function getUnreadMessagesCount(User $user)
    {
        return Message::where('recipient_id', $user->id)
            ->where('is_read', false)
            ->count();
    }
}