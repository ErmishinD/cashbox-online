<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    public function measure_types() {
        return $this->belongsToMany(ProductType::class, 'product_type_measures',
            'product_type_id', 'measure_type_id');
    }

    public function sell_products() {
        return $this->belongsToMany(ProductType::class, 'sell_product_product_type',
            'product_type_id', 'sell_product_id')
            ->withPivot('quantity');
    }
}
