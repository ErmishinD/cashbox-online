<?php

namespace App\Http\Requests\Api\ProductType;

use App\Http\Requests\TenantRequest;

class DashboardRequest extends TenantRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shop_id' => ['required'],
            'storage_ids' => ['nullable', 'array'],
            'storage_ids.*' => ['numeric']
        ];
    }
}
