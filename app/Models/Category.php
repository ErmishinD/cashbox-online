<?php

namespace App\Models;

use App\Contracts\ShouldReturnGetForSelect;
use App\Http\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia, ShouldReturnGetForSelect
{
    use HasFactory, SoftDeletes, InteractsWithMedia;
    use BelongsToCompany;

    protected $fillable = ['company_id', 'name'];

    public function sell_products()
    {
        return $this->hasMany(SellProduct::class);
    }

    public function product_types()
    {
        return $this->hasMany(ProductType::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile();
    }

    public function scopePrepareForSelect(Builder $builder)
    {
        return $builder->select('id', 'name');
    }
}
