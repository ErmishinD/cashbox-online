<?php

namespace App\Http\Requests\Api\ProductType;

use App\Http\Requests\TenantRequest;

class GetQuantityRequest extends TenantRequest
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
            'storage_ids.*' => ['numeric'],
            'with_expired' => ['required'],
            'per_page' => ['nullable'],
            'page' => ['nullable']
        ];
    }

    public function prepareForValidation()
    {
        parent::prepareForValidation();
        $this->merge([
            'per_page' => $this->perPage ?? ($this->per_page ?? null),
            'page' => $this->page ?? null,
            'with_expired' => $this->with_expired ?? false
        ]);
    }
}
