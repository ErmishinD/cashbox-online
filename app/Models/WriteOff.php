<?php

namespace App\Models;

use App\Contracts\SystemLoggable;
use App\Http\Traits\BelongsToCompany;
use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WriteOff extends Model implements SystemLoggable
{
    use HasFactory, SoftDeletes;
    use BelongsToCompany, Filterable;

    protected $fillable = ['company_id', 'storage_id', 'user_id', 'product_type_id', 'quantity', 'parent_id', 'data'];

    protected $casts = [
        'data' => 'array'
    ];

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product_type()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function write_offs()
    {
        return $this->hasMany(WriteOff::class, 'parent_id');
    }

    public function product_consumptions()
    {
        return $this->morphMany(ProductConsumption::class, 'consumable');
    }


    public function getTextForAudit(string $action, ?array $data): string
    {
        if ($action == SystemLog::ACTIONS['write_off']) {
            return __('Списание со склада') . ': ' . $data['storage_name'] . ' ' . __('в эквиваленте на сумму') . ': ' . $data['sum'] . ' грн';
        }
        return '';
    }

    public function getVueRoute(string $action): ?string
    {
        if ($action == SystemLog::ACTIONS['write_off']) {
            return 'write_off_show';
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
