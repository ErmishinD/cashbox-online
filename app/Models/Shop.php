<?php

namespace App\Models;

use App\Contracts\ShouldReturnGetForSelect;
use App\Contracts\SystemLoggable;
use App\Http\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Builder;
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
class Shop extends Model implements SystemLoggable, ShouldReturnGetForSelect
{
    use HasFactory, SoftDeletes, BelongsToCompany;

    protected $fillable = [
        'company_id', 'name', 'address',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function storages()
    {
        return $this->hasMany(Storage::class);
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
        return 'shops_show';
    }

    public function getVueParams(string $action): array
    {
        return ['id' => $this->id];
    }

    public function scopePrepareForSelect(Builder $builder)
    {
        return $builder->select('id', 'name', 'company_id');
    }
}
