<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string address
 * @method static inRandomOrder()
 */
class Shop extends Model
{
    use HasFactory;

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
