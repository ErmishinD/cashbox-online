<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string guard
 * @property int company_id
 * @property string human_name
 */
class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
