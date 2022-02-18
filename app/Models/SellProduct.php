<?php

namespace App\Models;

use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int company_id
 * @property string name
 * @property float price
 * @property boolean has_discount
 * @property string photo
 * @method static inRandomOrder()
 * @method static filter(\App\Filters\SellProductFilter $product_filters)
 */
class SellProduct extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = [
        'company_id', 'name', 'price', 'has_discount', 'photo'
    ];

    public function product_types() {
        return $this->belongsToMany(ProductType::class, 'sell_product_product_type',
            'sell_product_id', 'product_type_id')
            ->withPivot('quantity');
    }

    public function cashbox()
    {
        return $this->hasMany(Cashbox::class);
    }
}
