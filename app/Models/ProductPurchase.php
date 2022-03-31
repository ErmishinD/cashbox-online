<?php

namespace App\Models;

use App\Http\Traits\BelongsToCompany;
use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int storage_id
 * @property int product_type_id
 * @property int base_measure_type_id
 * @property int quantity
 * @property int current_quantity
 * @property float cost
 * @property \DateTime expiration_date
 * @property mixed product_type
 * @property \DateTime created_at
 */
class ProductPurchase extends Model
{
    use HasFactory, Filterable, BelongsToCompany;

    protected $fillable = [
        'storage_id', 'product_type_id', 'quantity', 'current_quantity', 'cost', 'expiration_date', 'company_id'
    ];

    public function product_type()
    {
        return $this->belongsTo(ProductType::class);
    }

}
