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
 * @property float price
 * @property boolean has_discount
 * @property string photo
 * @method static inRandomOrder()
 * @method static filter(\App\Filters\SellProductGroupFilter $group_filters)
 */
class SellProductGroup extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;
    use Filterable, BelongsToCompany;

    protected $fillable = [
        'company_id', 'name', 'has_discount', 'photo'
    ];

    public function products() {
        return $this->belongsToMany(SellProduct::class, 'sell_product_product_group',
            'sell_product_group_id', 'sell_product_id')
            ->withPivot('price');
    }
}
