<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use App\Contracts\SystemLoggable;
use App\Http\Traits\BelongsToCompany;
use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property int id
 * @property int company_id
 * @property string name
 * @property float price
 * @property boolean has_discount
 * @property string photo
 * @method static inRandomOrder()
 * @method static filter(\App\Filters\SellProductFilter $product_filters)
 */
class SellProduct extends Model implements HasMedia, SystemLoggable
{
    use HasFactory, SoftDeletes, InteractsWithMedia;
    use Filterable, BelongsToCompany;

    protected $fillable = [
        'company_id', 'name', 'price', 'has_discount', 'photo', 'category_id', 'position'
    ];

    public function product_types() {
        return $this->belongsToMany(ProductType::class, 'sell_product_product_type',
            'sell_product_id', 'product_type_id')
            ->withPivot('quantity');
    }

    public function cashbox()
    {
        return $this->hasMany(Cashbox::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile();
    }

    public function getTextForAudit(string $action, ?array $data): string
    {
        return $this->name;
    }

    public function getVueRoute(string $action): ?string
    {
        return 'products_for_sale_show';
    }

    public function getVueParams(string $action): array
    {
        return ['id' => $this->id];
    }

    public function scopePrepareForSelect(Builder $builder)
    {
        return $builder->select('id', 'name')->orderBy('name');
    }
}
