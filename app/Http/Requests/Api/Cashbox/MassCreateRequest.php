<?php

namespace App\Http\Requests\Api\Cashbox;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MassCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shop_id' => ['required'],
            'transaction_type' => ['required'],
            'payment_type' => ['required'],
            'operator_id' => ['required', 'exists:users,id'],
            'sell_products' => ['required', 'array'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'operator_id' => $this->operator_id ?? Auth::user()->id,
            'transaction_type' => $this->transaction_type ?? '_in',
        ]);
    }
}
