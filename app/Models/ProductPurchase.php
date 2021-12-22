<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int storage_id
 * @property int product_type_id
 * @property int measure_type_id
 * @property int quantity
 * @property int current_quantity
 * @property float cost
 * @property \DateTime expiration_date
 */
class ProductPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'storage_id', 'product_type_id', 'measure_type_id', 'quantity', 'current_quantity', 'cost', 'expiration_date',
    ];
}
