<?php

namespace App\Http\Requests\Api\ProductPurchase;

use App\Http\Requests\TenantRequest;

class DashboardRequest extends TenantRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shop_id' => ['required']
        ];
    }
}
