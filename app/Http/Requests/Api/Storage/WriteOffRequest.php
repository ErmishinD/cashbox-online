<?php

namespace App\Http\Requests\Api\Storage;

use App\Http\Requests\TenantRequest;
use Illuminate\Support\Facades\Auth;

class WriteOffRequest extends TenantRequest
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
            'storage_id' => ['required'],
            'user_id' => ['required'],
            'product_types' => ['required', 'array'],
            'product_types.*.id' => ['numeric'],
            'product_types.*.quantity' => ['numeric']
        ];
    }

    public function prepareForValidation()
    {
        parent::prepareForValidation();
        $this->merge([
            'user_id' => Auth::id()
        ]);
    }
}
