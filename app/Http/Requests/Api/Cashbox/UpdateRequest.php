<?php

namespace App\Http\Requests\Api\Cashbox;

use App\Http\Requests\TenantRequest;
use App\Models\Cashbox;
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
            'payment_type' => ['required', Rule::in(Cashbox::PAYMENT_TYPES)],
            'description' => ['nullable'],
        ];
    }

    public function prepareForValidation()
    {
        parent::prepareForValidation();
        $this->merge([
            'payment_type' => $this->payment_type ?? Cashbox::PAYMENT_TYPES['cash'],
        ]);
    }
}
