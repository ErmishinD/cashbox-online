<?php

namespace App\Http\Requests\Api\Transfer;

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
            'from_storage_id' => ['required'],
            'to_storage_id' => ['required'],
            'product_type_id' => ['required'],
            'quantity' => ['required'],
            'confirmed_by' => ['nullable'],
        ];
    }
}
