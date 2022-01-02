<?php

namespace App\Http\Requests\Api\ProductPurchase;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'storage_id' => ['required'],
            'product_type_id' => ['required'],
            'measure_type_id' => ['required'],
            'quantity' => ['required'],
            'current_quantity' => ['nullable'],
            'cost' => ['required'],
            'expiration_date' => ['nullable'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'current_quantity' => $this->quantity
        ]);
    }
}
