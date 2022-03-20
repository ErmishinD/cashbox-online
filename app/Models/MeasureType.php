<?php

namespace App\Models;

use App\Models\Scopes\InCompanyScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int base_measure_type_id
 * @property string name
 * @property string description
 * @property int quantity
 * @property int company_id
 * @property boolean is_common
 * @method static inRandomOrder()
 */
class MeasureType extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new InCompanyScope);
    }

    public const TYPES = ['weight' => '_weight', 'volume' => '_volume', 'quantity' => '_quantity'];

    protected $fillable = [
        'base_measure_type_id', 'name', 'description', 'quantity', 'company_id', 'is_common',
    ];

    public function product_types() {
        return $this->belongsToMany(ProductType::class, 'product_type_measures',
            'measure_type_id', 'product_type_id');
    }

    public function base_measure_type()
    {
        return $this->belongsTo(BaseMeasureType::class);
    }
}
