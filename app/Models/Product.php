<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'price_ht',
        'tax_rate'
    ];
    
    protected $casts = [
        'price_ht' => 'float',
        'tax_rate' => 'float'
    ];
}
