<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_id',
        'user_id',
        'artisan_id',
        'invoice_number',
        'amount',
        'issued_date',
        'due_date',
        'status',
        'notes',
        'type',
        'operation_type',
        'credit_status',
        'refund_status',
        'client_full_name',
        'client_contact'
    ];

    protected $casts = [
        'issued_date' => 'date',
        'due_date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function quote(): BelongsTo
    {
        return $this->belongsTo(Quote::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function artisan(): BelongsTo
    {
        return $this->belongsTo(Artisan::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }
    
    public function getTotalAmountAttribute()
    {
        return $this->items->sum('total_price');
    }
    
    /**
     * Définir un mutateur pour s'assurer que le numéro de facture est toujours en majuscules
     */
    public function setInvoiceNumberAttribute($value)
    {
        $this->attributes['invoice_number'] = strtoupper($value);
    }
}