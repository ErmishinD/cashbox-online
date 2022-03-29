<?php

namespace App\Models;

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
 * @property string type
 * @property string photo
 * @property int base_measure_type_id
 * @property string barcode
 * @property int main_measure_type_id
 * @method static inRandomOrder()
 * @method static filter(\App\Filters\ProductTypeFilter $filters)
 */
class ProductType extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;
    use Filterable, BelongsToCompany;

    public const TYPES = ['perishable' => '_perishable', 'imperishable' => '_imperishable'];

    protected $fillable = [
        'company_id', 'name', 'type', 'photo', 'base_measure_type_id', 'main_measure_type_id', 'barcode',
    ];

    public function measure_types()
    {
        return $this->belongsToMany(MeasureType::class, 'product_type_measures',
            'product_type_id', 'measure_type_id');
    }

    public function sell_products()
    {
        return $this->belongsToMany(SellProduct::class, 'sell_product_product_type',
            'product_type_id', 'sell_product_id')
            ->withPivot('quantity');
    }

    public function base_measure_type()
    {
        return $this->belongsTo(BaseMeasureType::class);
    }

    public function main_measure_type()
    {
        return $this->belongsTo(MeasureType::class, 'main_measure_type_id', 'id');
    }

    public function product_purchases()
    {
        return $this->hasMany(ProductPurchase::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile();
    }
}
