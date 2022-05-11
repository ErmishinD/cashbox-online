<?php

namespace App\Models;

use App\Contracts\SystemLoggable;
use App\Http\Traits\BelongsToCompany;
use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

/**
 * @property int id
 * @property int storage_id
 * @property int product_type_id
 * @property int base_measure_type_id
 * @property int quantity
 * @property int current_quantity
 * @property float cost
 * @property float current_cost
 * @property \DateTime expiration_date
 * @property mixed product_type
 * @property \DateTime created_at
 */
class ProductPurchase extends Model implements SystemLoggable
{
    use HasFactory, SoftDeletes, HasEagerLimit;
    use Filterable, BelongsToCompany;

    protected $fillable = [
        'storage_id', 'product_type_id', 'quantity', 'current_quantity', 'cost', 'expiration_date', 'company_id',
        'user_id', 'parent_id', 'current_cost'
    ];

    protected $dates = ['expiration_date'];

    public function product_type()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function storage() {
        return $this->belongsTo(Storage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product_purchases()
    {
        return $this->hasMany(ProductPurchase::class, 'parent_id');
    }

    public function getTextForAudit(string $action, ?array $data): string
    {
        if ($action == SystemLog::ACTIONS['purchased']) {
            return __('Закупка на сумму') . ': ' . ($data['sum'] ?? 0);
        } elseif (in_array($action, [SystemLog::ACTIONS['deleted'], SystemLog::ACTIONS['edited']])) {
            return __('Закупка') . ' #' . $this->id;
        }
        return '';
    }

    public function getVueRoute(string $action): ?string
    {
        if ($this->deleted_at) {
            return null;
        }

        if (in_array($action, [SystemLog::ACTIONS['purchased'], SystemLog::ACTIONS['edited']])) {
            return 'purchases_show';
        }
        return null;
    }

    public function getVueParams(string $action): array
    {
        return ['id' => $this->id];
    }
}
