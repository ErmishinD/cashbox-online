<?php

namespace App\Models;

use App\Http\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int id
 * @property string name
 * @property string guard
 * @property int company_id
 * @property string human_name
 */
class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory, BelongsToCompany;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
