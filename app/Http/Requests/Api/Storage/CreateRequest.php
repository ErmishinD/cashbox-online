<?php

namespace App\Http\Requests\Api\Storage;

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
            'shop_id' => ['required'],
            'company_id' => ['required'],
            'name' => [
                'required',
                'string',
                Rule::unique('storages')->where(function ($query) {
                    return $query->where('company_id', session('company_id'));
                })->ignore($this->storage)
            ],
        ];
    }

    public function prepareForValidation()
    {
        parent::prepareForValidation();
        $this->merge([
            'name' => $this->name ?? 'Склад '. Auth::id() . '-' . Str::random(5),
        ]);
    }
}
