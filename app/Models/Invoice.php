<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
     use HasFactory;

    protected $fillable = [
        'bill_no',
        'bill_date',
        'order_no',
        'messers',
        'address',
        'client_id',
        'total_rs',
        'total_in_words',
    ];

    /**
     * An invoice has many items.
     */
    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
