<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int shop_id
 * @property string name
 * @method static inRandomOrder()
 */
class Storage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'shop_id', 'name'
    ];
}
