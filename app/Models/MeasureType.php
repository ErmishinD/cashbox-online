<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasureType extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_measure_type_id', 'name', 'description', 'quantity', 'company_id', 'is_common',
    ];

    public function product_types() {
        return $this->belongsToMany(ProductType::class, 'product_type_measures',
            'measure_type_id', 'product_type_id');
    }
}
