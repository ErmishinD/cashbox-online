<?php

namespace App\Models;

use App\Contracts\ShouldReturnGetForSelect;
use App\Http\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Counterparty extends Model implements ShouldReturnGetForSelect
{
    use HasFactory, SoftDeletes;
    use BelongsToCompany;

    protected $fillable = ['name', 'company_id'];

    public function scopePrepareForSelect(Builder $builder)
    {
        $builder->select('id', 'name');
    }

    public function product_purchases()
    {
        return $this->hasMany(ProductPurchase::class);
    }

    public function product_consumptions()
    {
        return $this->hasManyThrough(ProductConsumption::class, ProductPurchase::class);
    }
}
