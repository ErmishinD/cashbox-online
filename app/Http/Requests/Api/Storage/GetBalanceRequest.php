<?php

namespace App\Http\Requests\Api\Storage;

use App\Http\Requests\TenantRequest;

class GetBalanceRequest extends TenantRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'storage_ids' => ['present', 'array'],
            'storage_ids.*' => ['numeric']
        ];
    }
}
