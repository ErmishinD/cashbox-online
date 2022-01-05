<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int company_id
 * @property string name
 * @property float price
 * @property boolean has_discount
 * @method static inRandomOrder()
 */
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
