<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_storage_id', 'to_storage_id', 'product_type_id', 'quantity', 'confirmed_by',
    ];
}
