<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'name', 'price', 'has_discount',
    ];

    public function product_types() {
        return $this->belongsToMany(ProductType::class, 'sell_product_product_type',
            'sell_product_id', 'product_type_id')
            ->withPivot('quantity');
    }
}
