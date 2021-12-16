<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashbox extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'shop_id', 'resource', 'resource_id', 'transaction_type', 'payment_type', 'amount',
        'description', 'operator_id', 'collected_at', 'collector_id',
    ];
}
