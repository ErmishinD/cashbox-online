<?php

namespace App\Models;

use App\Http\Traits\BelongsToCompany;
use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductConsumption extends Model
{
    use HasFactory, SoftDeletes;
    use Filterable, BelongsToCompany;

    protected $fillable = [
        'company_id',
        'product_purchase_id',
        'consumable_type',
        'consumable_id',
        'quantity',
        'cost',
        'income',
        'profit',
    ];

    public function consumable()
    {
        return $this->morphTo();
    }

    public function product_purchase()
    {
        return $this->belongsTo(ProductPurchase::class);
    }

}
