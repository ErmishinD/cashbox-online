<?php

namespace App\Models;

use App\Contracts\SystemLoggable;
use App\Http\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int shop_id
 * @property string name
 * @property mixed product_purchases
 * @method static inRandomOrder()
 */
class Storage extends Model implements SystemLoggable
{
    use HasFactory, SoftDeletes, BelongsToCompany;

    protected $fillable = [
        'shop_id', 'name', 'company_id'
    ];

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
        return 'storages_show';
    }

    public function getVueParams(string $action): array
    {
        return ['id' => $this->id];
    }
}
