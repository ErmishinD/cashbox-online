<?php


namespace App\Http\Traits;


use App\Models\Scopes\InCompanyScope;

trait BelongsToCompany
{
    public static function bootBelongsToCompany()
    {
        static::addGlobalScope(new InCompanyScope);
    }
}
