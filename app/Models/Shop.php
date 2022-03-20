<?php

namespace App\Models;

use App\Models\Scopes\InCompanyScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property string name
 * @property string address
 * @property mixed storages
 * @method static inRandomOrder()
 */
class Shop extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new InCompanyScope);
    }

    protected $fillable = [
        'company_id', 'name', 'address',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function storages() {
        return $this->hasMany(Storage::class);
    }
}
