<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_request_id',
        'artisan_id',
        'product_id',
        'price_ht',
        'tax_rate',
        'amount',
        'description',
        'valid_until',
        'status'
    ];

    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class);
    }

    public function artisan()
    {
        return $this->belongsTo(Artisan::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
