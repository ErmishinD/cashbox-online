<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int company_id
 * @property int shop_id
 * @property int sell_product_id
 * @property array data
 * @property float amount
 * @property string payment_type
 * @property int operator_id
 * @property string description
 * @property string transaction_type
 * @property \DateTime collected_at
 * @property int collector_id
 * @property int parent_id
 */
class Cashbox extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'shop_id', 'sell_product_id', 'data', 'transaction_type', 'payment_type', 'amount',
        'description', 'operator_id', 'collected_at', 'collector_id', 'parent_id',
    ];
}
