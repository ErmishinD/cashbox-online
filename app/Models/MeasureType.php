<?php

namespace App\Models;

use App\Http\Traits\BelongsToCompany;
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
    use HasFactory, SoftDeletes, BelongsToCompany;

    protected $fillable = [
        'base_measure_type_id', 'name', 'description', 'quantity', 'company_id', 'is_common',
    ];

    public function product_types() {
        return $this->belongsToMany(ProductType::class, 'product_type_measures',
            'measure_type_id', 'product_type_id');
    }
}
