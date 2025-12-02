<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtisanWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'artisan_id',
        'title',
        'description',
        'image_path',
        'category',
        'completion_date',
        'client_name'
    ];

    protected $casts = [
        'completion_date' => 'date'
    ];

    public function artisan()
    {
        return $this->belongsTo(Artisan::class);
    }
}