<?php

namespace App\Models;

use App\Contracts\SystemLoggable;
use App\Http\Traits\BelongsToCompany;
use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * @property int id
 * @property int shop_id
 * @property int sell_product_id
 * @property array data
 * @property float amount
 * @property float self_cost
 * @property float profit
 * @property string payment_type
 * @property int operator_id
 * @property string description
 * @property string transaction_type
 * @property \DateTime collected_at
 * @property int collector_id
 * @property int parent_id
 * @property \DateTime created_at
 * @property SellProduct sell_product
 * @property ProductPurchase product_purchase
 * @property User operator
 * @property User collector
 * @property Shop shop
 */
class Cashbox extends Model implements SystemLoggable
{
    use HasFactory, SoftDeletes, Filterable, BelongsToCompany;

    public const TRANSACTION_TYPES = ['in' => '_in', 'out' => '_out'];
    public const PAYMENT_TYPES = ['card' => '_card', 'cash' => '_cash'];

    protected $fillable = [
        'shop_id', 'sell_product_id', 'data', 'transaction_type', 'payment_type', 'amount',
        'description', 'operator_id', 'collected_at', 'collector_id', 'parent_id', 'company_id',
        'self_cost', 'profit'
    ];

    protected $dates = ['collected_at'];

    protected $casts = ['data' => 'array'];

    protected static function booted()
    {
        static::addGlobalScope('onlyMySales', function (Builder $builder) {
            if (Auth::check() && Auth::user()->hasPermissionTo('Cashbox_viewOnlyMySales')) {
                $builder->where('operator_id', Auth::id());
            }
        });
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function sell_product()
    {
        return $this->belongsTo(SellProduct::class);
    }

    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }

    public function collector()
    {
        return $this->belongsTo(User::class, 'collector_id');
    }

    public function payments()
    {
        return $this->hasMany(Cashbox::class, 'parent_id');
    }

    public function scopeNotCollected(Builder $builder)
    {
        return $builder->whereNull('collected_at');
    }

    public function scopeCollected(Builder $builder, $collected_at=null)
    {
        if (is_null($collected_at))
            return $builder->whereNotNull('collected_at');
        return $builder->where('collected_at', $collected_at);
    }

    public function getTextForAudit(string $action, ?array $data): string
    {
        if ($action == SystemLog::ACTIONS['collected']) {
            return __('Операции на сумму') . ': ' . ($data['sum'] ?? 0);
        }
        elseif ($action == SystemLog::ACTIONS['sold']) {
            return __('Заказ на сумму') . ': ' . ($data['sum'] ?? 0);
        }
        return '';
    }

    public function getVueRoute(string $action): ?string
    {
        if ($action == SystemLog::ACTIONS['collected']) {
            return 'reports_cashbox_collections';
        }
        elseif ($action == SystemLog::ACTIONS['sold']) {
            return 'sale_detail';
        }
        return null;
    }

    public function getVueParams(string $action): array
    {
        if ($action == SystemLog::ACTIONS['collected']) {
            return ['collected_at' => $this->collected_at->format('Y-m-d H:i:s')];
        }
        elseif ($action == SystemLog::ACTIONS['sold']) {
            return ['id' => $this->id];
        }
        return [];
    }
}
