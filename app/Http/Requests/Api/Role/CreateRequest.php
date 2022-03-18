<?php

namespace App\Http\Requests\Api\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            'name' => ['required'],
            'human_name' => ['required'],
            'company_id' => ['required'],
            'permissions' => ['nullable', 'array']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
           'name' => Str::slug($this->human_name) . '.' . Auth::user()->company_id,
           'company_id' =>  Auth::user()->company_id
        ]);
    }
}
