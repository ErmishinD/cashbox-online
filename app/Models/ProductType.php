<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int company_id
 * @property string name
 * @property string type
 * @property string photo
 * @property int base_measure_type_id
 * @property string barcode
 * @method static inRandomOrder()
 */
class ProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'name', 'type', 'photo', 'base_measure_type_id', 'barcode',
    ];

    public function measure_types() {
        return $this->belongsToMany(MeasureType::class, 'product_type_measures',
            'product_type_id', 'measure_type_id');
    }

    public function sell_products() {
        return $this->belongsToMany(SellProduct::class, 'sell_product_product_type',
            'product_type_id', 'sell_product_id')
            ->withPivot('quantity');
    }
}
