<?php

namespace App\Models;

use App\Http\Traits\BelongsToCompany;
use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    use HasFactory;
    use BelongsToCompany, Filterable;

    public const ACTIONS = [
        'created' => '_created',
        'edited' => '_edited',
        'deleted' => '_deleted',
        'sold' => '_sold',
        'purchased' => '_purchased',
        'collected' => '_collected',
        'changed_shop' => '_changed_shop',
        'write_off' => '_write_off'
    ];

    protected $fillable = ['company_id', 'action', 'user_id', 'loggable_type', 'loggable_id', 'data'];

    protected $casts = [
        'data' => 'array'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loggable()
    {
        return $this->morphTo('loggable', 'loggable_type', 'loggable_id')->withTrashed();
    }
}
