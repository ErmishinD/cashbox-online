<?php

namespace App\Models;

use App\Contracts\SystemLoggable;
use App\Http\Traits\BelongsToCompany;
use App\Models\Scopes\InCompanyScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property int id
 * @property string name
 * @property string username
 * @property string email
 * @property int company_id
 * @method static inRandomOrder()
 */
class User extends Authenticatable implements SystemLoggable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;
    use BelongsToCompany;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function product_purchases()
    {
        return $this->hasMany(ProductPurchase::class);
    }

    public function getTextForAudit(string $action, ?array $data): string
    {
        return $this->name;
    }

    public function getVueRoute(string $action): ?string
    {
        if ($this->deleted_at) {
            return null;
        }
        return 'users_show';
    }

    public function getVueParams(string $action): array
    {
        return ['id' => $this->id];
    }
}
