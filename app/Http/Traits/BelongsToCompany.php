<?php


namespace App\Http\Traits;


use App\Models\Scopes\InCompanyScope;

trait BelongsToCompany
{
    public function bootInCompany()
    {
        static::addGlobalScope(new InCompanyScope());
    }
}
