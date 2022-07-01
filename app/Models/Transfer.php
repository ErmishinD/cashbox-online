<?php

namespace App\Models;

use App\Contracts\SystemLoggable;
use App\Http\Traits\BelongsToCompany;
use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int company_id
 * @property int from_storage_id
 * @property int to_storage_id
 * @property int product_purchase_id
 * @property int transferred_by
 * @property int parent_id
 * @property array data
 */
class Transfer extends Model implements SystemLoggable
{
    use HasFactory, SoftDeletes;
    use BelongsToCompany, Filterable;

    protected $fillable = [
        'company_id', 'from_storage_id', 'to_storage_id', 'product_purchase_id', 'transferred_by', 'parent_id',
        'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    public function from_storage()
    {
        return $this->belongsTo(Storage::class, 'from_storage_id');
    }

    public function to_storage()
    {
        return $this->belongsTo(Storage::class, 'to_storage_id');
    }

    public function product_purchase()
    {
        return $this->belongsTo(ProductPurchase::class);
    }

    public function transferred_by_user()
    {
        return $this->belongsTo(User::class, 'transferred_by');
    }

    public function transfers()
    {
        return $this->hasMany(Transfer::class, 'parent_id');
    }

    public function product_consumptions()
    {
        return $this->morphMany(ProductConsumption::class, 'consumable');
    }

    public function getTextForAudit(string $action, ?array $data): string
    {
        if ($action == SystemLog::ACTIONS['transferred']) {
            return __('Со склада') . ': ' . $data['from_storage_name'] . ', ' . __('на склад') . ': ' . $data['to_storage_name'] . ' ' . __('в эквиваленте на сумму') . ': ' . $data['sum'] . ' грн';
        }
        return '';
    }

    public function getVueRoute(string $action): ?string
    {
        if ($action == SystemLog::ACTIONS['transferred']) {
            return 'transfers_show';
        }
        return null;
    }

    public function getVueParams(string $action): array
    {
        if (!$this->deleted_at) {
            return ['id' => $this->id];
        }
        return [];
    }
}
