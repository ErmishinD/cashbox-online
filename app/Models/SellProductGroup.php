<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellProductGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'name', 'price', 'has_discount',
    ];

    public function product_types() {
        return $this->belongsToMany(SellProduct::class, 'sell_product_product_group',
            'sell_product_group_id', 'sell_product_id')
            ->withPivot('quantity');
    }
}
