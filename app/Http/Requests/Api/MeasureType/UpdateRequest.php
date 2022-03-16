<?php

namespace App\Http\Requests\Api\MeasureType;

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
            'name' => ['nullable'],
            'description' => ['nullable'],
            'quantity' => ['nullable', 'min:1'],
            'is_common' => ['nullable', 'boolean'],
        ];
    }
}
