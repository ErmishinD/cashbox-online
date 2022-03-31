<?php

namespace App\Http\Requests\Api\Shop;

use App\Http\Requests\TenantRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends TenantRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('shops')->where(function ($query) {
                    return $query->where('company_id', session('company_id'));
                })->ignore($this->shop)
            ],
            'address' => ['nullable'],
            'storage_names' => ['nullable', 'array'],
            'storage_names.*' => ['string'],
        ];
    }
}
