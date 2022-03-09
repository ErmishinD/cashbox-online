<?php

namespace App\Models;

use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int shop_id
 * @property int sell_product_id
 * @property int product_purchase_id
 * @property array data
 * @property float amount
 * @property string payment_type
 * @property int operator_id
 * @property string description
 * @property string transaction_type
 * @property \DateTime collected_at
 * @property int collector_id
 * @property int parent_id
 * @property \DateTime created_at
 * @property SellProduct sell_product
 * @property ProductPurchase product_purchase
 * @property User operator
 * @property User collector
 * @property Shop shop
 */
class Cashbox extends Model
{
    use HasFactory, Filterable;

    public const TRANSACTION_TYPES = ['in' => '_in', 'out' => '_out'];
    public const PAYMENT_TYPES = ['card' => '_card', 'cash' => '_cash'];

    protected $fillable = [
        'shop_id', 'sell_product_id', 'product_purchase_id', 'data', 'transaction_type', 'payment_type', 'amount',
        'description', 'operator_id', 'collected_at', 'collector_id', 'parent_id',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function sell_product()
    {
        return $this->belongsTo(SellProduct::class);
    }

    public function product_purchase()
    {
        return $this->belongsTo(ProductPurchase::class);
    }

    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }

    public function collector()
    {
        return $this->belongsTo(User::class, 'collector_id');
    }
}
