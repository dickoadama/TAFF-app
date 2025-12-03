<?php

namespace App\Services;

use App\Models\PushNotification;
use App\Models\User;

class NotificationService
{
    /**
     * Envoyer une notification à un utilisateur spécifique
     *
     * @param User $user
     * @param string $title
     * @param string $message
     * @param string $type
     * @param string|null $url
     * @param array|null $data
     * @return PushNotification
     */
    public function sendToUser(User $user, string $title, string $message, string $type = 'info', string $url = null, array $data = null)
    {
        return PushNotification::create([
            'user_id' => $user->id,
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'url' => $url,
            'data' => $data
        ]);
    }
    
    /**
     * Envoyer une notification à tous les utilisateurs
     *
     * @param string $title
     * @param string $message
     * @param string $type
     * @param string|null $url
     * @param array|null $data
     * @return void
     */
    public function sendToAllUsers(string $title, string $message, string $type = 'info', string $url = null, array $data = null)
    {
        $users = User::all();
        
        foreach ($users as $user) {
            PushNotification::create([
                'user_id' => $user->id,
                'title' => $title,
                'message' => $message,
                'type' => $type,
                'url' => $url,
                'data' => $data
            ]);
        }
    }
    
    /**
     * Envoyer une notification à plusieurs utilisateurs
     *
     * @param array $userIds
     * @param string $title
     * @param string $message
     * @param string $type
     * @param string|null $url
     * @param array|null $data
     * @return void
     */
    public function sendToUsers(array $userIds, string $title, string $message, string $type = 'info', string $url = null, array $data = null)
    {
        foreach ($userIds as $userId) {
            PushNotification::create([
                'user_id' => $userId,
                'title' => $title,
                'message' => $message,
                'type' => $type,
                'url' => $url,
                'data' => $data
            ]);
        }
    }
    
    /**
     * Obtenir le nombre de notifications non lues pour un utilisateur
     *
     * @param User $user
     * @return int
     */
    public function getUnreadCount(User $user)
    {
        return PushNotification::where('user_id', $user->id)
            ->where('is_read', false)
            ->count();
    }
    
    /**
     * Marquer toutes les notifications comme lues pour un utilisateur
     *
     * @param User $user
     * @return void
     */
    public function markAllAsRead(User $user)
    {
        PushNotification::where('user_id', $user->id)
            ->where('is_read', false)
            ->update([
                'is_read' => true,
                'read_at' => now()
            ]);
    }
}