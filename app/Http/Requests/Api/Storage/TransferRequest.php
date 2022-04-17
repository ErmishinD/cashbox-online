<?php

namespace App\Http\Requests\Api\Storage;

use App\Http\Requests\TenantRequest;
use Illuminate\Support\Facades\Auth;

class TransferRequest extends TenantRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_id' => ['required'],
            'from_storage_id' => ['required'],
            'to_storage_id' => ['required'],
            'transferred_by' => ['required'],
            'product_types' => ['required', 'array'],
            'product_types.*.id' => ['numeric'],
            'product_types.*.quantity' => ['numeric']
        ];
    }

    public function prepareForValidation()
    {
        parent::prepareForValidation();
        $this->merge([
            'transferred_by' => Auth::id(),
        ]);
    }
}
