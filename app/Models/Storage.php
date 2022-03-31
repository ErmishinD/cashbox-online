<?php

namespace App\Models;

use App\Http\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int shop_id
 * @property string name
 * @property mixed product_purchases
 * @method static inRandomOrder()
 */
class Storage extends Model
{
    use HasFactory, SoftDeletes, BelongsToCompany;

    protected $fillable = [
        'shop_id', 'name', 'company_id'
    ];

    public function product_purchases()
    {
        return $this->hasMany(ProductPurchase::class);
    }
}
