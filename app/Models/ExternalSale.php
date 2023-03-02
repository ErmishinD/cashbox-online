<?php

namespace App\Models;

use App\Http\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExternalSale extends Model
{
    use HasFactory, SoftDeletes;
    use BelongsToCompany;

    protected $fillable = [
        'company_id',
        'shop_id',
        'amount',
        'sell_product_id',
        'payment_type',
        'description',
        'confirmed_at',
    ];

    protected $casts = [
        'confirmed_at' => 'datetime'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function sell_product()
    {
        return $this->belongsTo(SellProduct::class);
    }

    public function cashbox_payments()
    {
        return $this->hasMany(Cashbox::class);
    }
}
