<?php

namespace App\Http\Requests\Api\ProductPurchase;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'storage_id' => ['nullable'],
            'product_type_id' => ['nullable'],
            'quantity' => ['nullable'],
            'current_quantity' => ['nullable'],
            'cost' => ['nullable'],
            'expiration_date' => ['nullable'],
        ];
    }
}
