<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int from_storage_id
 * @property int to_storage_id
 * @property int product_type_id
 * @property int quantity
 * @property int confirmed_by
 */
class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_storage_id', 'to_storage_id', 'product_type_id', 'quantity', 'confirmed_by',
    ];
}
