<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'storage_id', 'product_type_id', 'measure_type_id', 'quantity', 'current_quantity', 'cost', 'expiration_date',
    ];
}
