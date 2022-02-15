<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PaginateRequest extends FormRequest
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
            'perPage' => ['required'],
            'page' => ['required']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'perPage' => $this->perPage ?? 10,
            'page' => $this->page ?? 1
        ]);
    }
}
