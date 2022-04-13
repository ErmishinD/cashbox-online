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
        'created' => 'created',
        'edited' => 'edited',
        'deleted' => 'deleted',
        'sold' => 'sold',
        'purchased' => 'purchased',
        'collected' => 'collected',
    ];

    protected $fillable = ['company_id', 'action', 'user_id', 'loggable_type', 'loggable_id'];

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
