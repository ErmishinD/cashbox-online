<?php

namespace App\Http\Requests\Api;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GetByCompanyRequest extends FormRequest
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
            'company_id' => ['required', 'exists:companies,id']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'company_id' => $this->company_id ?? Auth::user()->company_id
        ]);
    }
}
