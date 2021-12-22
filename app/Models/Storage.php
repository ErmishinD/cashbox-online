<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int shop_id
 */
class Storage extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id', 'name'
    ];
}
