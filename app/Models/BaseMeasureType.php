<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string type
 * @property string name
 * @method static inRandomOrder()
 */
class BaseMeasureType extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'name'];
}
