<?php

namespace App\Http\Requests\Api\ProductPurchase;

use App\Http\Requests\TenantRequest;
use App\Models\Cashbox;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MassCreateRequest extends TenantRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'storage_id' => ['required'],
            'payment_type' => ['required', Rule::in(Cashbox::PAYMENT_TYPES)],
            'product_types' => ['required', 'array'],
            'user_id' => ['required']
        ];
    }

    public function prepareForValidation()
    {
        parent::prepareForValidation();
        $this->merge([
            'user_id' => Auth::id(),
        ]);
    }
}
