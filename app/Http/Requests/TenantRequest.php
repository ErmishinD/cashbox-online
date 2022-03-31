<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TenantRequest extends FormRequest
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


    public function prepareForValidation()
    {
        info('in tenant request');
        $this->merge([
            'company_id' => session('company_id') ?? (Auth::user()->company_id ?? optional(Company::first())->id),
            'shop_id' => session('shop_id'),
        ]);
    }
}
