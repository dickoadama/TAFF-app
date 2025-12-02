<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
        'unit_price',
        'tax_rate',
        'discount_rate',
        'description'
    ];
    
    protected $casts = [
        'quantity' => 'integer',
        'unit_price' => 'float',
        'tax_rate' => 'float',
        'discount_rate' => 'float'
    ];
    
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function getTotalPriceAttribute()
    {
        $subtotal = $this->unit_price * $this->quantity;
        $discountAmount = $subtotal * ($this->discount_rate / 100);
        $subtotalAfterDiscount = $subtotal - $discountAmount;
        $taxAmount = $subtotalAfterDiscount * ($this->tax_rate / 100);
        return $subtotalAfterDiscount + $taxAmount;
    }
}
