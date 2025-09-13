<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceItem extends Model
{
      use HasFactory;

    protected $fillable = [
        'invoice_id',
        'sn',
        'particulars',
        'qty',
        'rate',
        'amount',
        'paise',
    ];

    /**
     * Each item belongs to an invoice.
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
