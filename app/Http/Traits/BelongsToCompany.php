<?php


namespace App\Http\Traits;


use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait BelongsToCompany
{
    public function scopeOnlyInCompany(Builder $builder, $company_id=null)
    {
        $company_id = $company_id ?? Auth::user()->company_id;
        if ($company_id) {
            return $builder->where('company_id', $company_id);
        }
        return $builder;
    }
}
