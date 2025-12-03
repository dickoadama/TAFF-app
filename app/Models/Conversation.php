<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Message;

class Conversation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user1_id',
        'user2_id',
        'is_active'
    ];
    
    protected $casts = [
        'is_active' => 'boolean'
    ];
    
    public function user1()
    {
        return $this->belongsTo(User::class, 'user1_id');
    }
    
    public function user2()
    {
        return $this->belongsTo(User::class, 'user2_id');
    }
    
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    /**
     * Obtenir l'autre participant dans la conversation
     */
    public function otherParticipant($userId)
    {
        return $this->user1_id == $userId ? $this->user2 : $this->user1;
    }
}
