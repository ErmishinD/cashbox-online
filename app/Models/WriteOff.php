<?php

namespace App\Models;

use App\Contracts\SystemLoggable;
use App\Http\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WriteOff extends Model implements SystemLoggable
{
    use HasFactory, SoftDeletes;
    use BelongsToCompany;

    protected $fillable = ['company_id', 'storage_id', 'user_id', 'product_type_id', 'quantity', 'parent_id', 'data'];

    protected $casts = [
        'data' => 'array'
    ];


    public function getTextForAudit(string $action, ?array $data): string
    {
        if ($action == SystemLog::ACTIONS['write_off']) {
            return __('Списание со склада') . ' ' . $data['storage_name'] . ' ' . __('в эквиваленте на сумму') . $data['sum'];
        }
        return '';
    }

    public function getVueRoute(string $action): ?string
    {
        return '';
    }

    public function getVueParams(string $action): array
    {
        if (!$this->deleted_at) {
            return ['id' => $this->id];
        }
        return [];
    }
}
