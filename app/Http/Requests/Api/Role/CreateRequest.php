<?php

namespace App\Http\Requests\Api\Role;

use App\Http\Requests\TenantRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CreateRequest extends TenantRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('roles')->where(function ($query) {
                    return $query->where('company_id', session('company_id'));
                })->ignore($this->role)
            ],
            'human_name' => ['required'],
            'company_id' => ['required'],
            'permissions' => ['nullable', 'array']
        ];
    }

    public function prepareForValidation()
    {
        parent::prepareForValidation();
        $this->merge([
           'name' => Str::slug($this->human_name) . '.' . Auth::user()->company_id,
        ]);
    }
}
