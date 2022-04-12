<?php

namespace App\Http\Requests\Api\Category;

use App\Http\Requests\TenantRequest;

class CreateRequest extends TenantRequest
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
            'company_id' => ['required']
        ];
    }
}
