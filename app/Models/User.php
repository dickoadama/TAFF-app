<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\PushNotification;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * Relation avec les notifications
     */
    public function notifications()
    {
        return $this->hasMany(PushNotification::class);
    }
    
    /**
     * Obtenir les notifications non lues
     */
    public function unreadNotifications()
    {
        return $this->notifications()->where('is_read', false);
    }
    
    /**
     * Relations pour la messagerie
     */
    public function conversationsAsUser1()
    {
        return $this->hasMany(Conversation::class, 'user1_id');
    }
    
    public function conversationsAsUser2()
    {
        return $this->hasMany(Conversation::class, 'user2_id');
    }
    
    public function messagesSent()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
    
    public function messagesReceived()
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }
    
    /**
     * Obtenir toutes les conversations de l'utilisateur
     */
    public function conversations()
    {
        return $this->conversationsAsUser1->merge($this->conversationsAsUser2);
    }
    
    /**
     * Obtenir les messages non lus
     */
    public function unreadMessages()
    {
        return $this->messagesReceived()->where('is_read', false);
    }
}
