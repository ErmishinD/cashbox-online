<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int company_id
 * @property string name
 * @property float price
 * @property boolean has_discount
 * @method static inRandomOrder()
 */
class SellProductGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id', 'name', 'price', 'has_discount',
    ];

    public function products() {
        return $this->belongsToMany(SellProduct::class, 'sell_product_product_group',
            'sell_product_group_id', 'sell_product_id')
            ->withPivot('quantity');
    }
}
