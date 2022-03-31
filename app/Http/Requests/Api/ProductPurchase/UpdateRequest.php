<?php

namespace App\Http\Requests\Api\ProductPurchase;

use App\Http\Requests\TenantRequest;

class UpdateRequest extends TenantRequest
{
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
