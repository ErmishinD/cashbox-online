<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id', 'name', 'type', 'photo', 'base_measure_type_id', 'main_measure_type_id', 'barcode',
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

    public function base_measure_type() {
        return $this->belongsTo(BaseMeasureType::class);
    }

    public function main_measure_type()
    {
        return $this->belongsTo(MeasureType::class, 'main_measure_type_id', 'id');
    }
}
