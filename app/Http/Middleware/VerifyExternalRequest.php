<?php

namespace App\Http\Middleware;

use App\Models\Company;
use Closure;
use Illuminate\Http\Request;

class VerifyExternalRequest
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasHeader('X-API-TOKEN')) {
            abort(401, 'API token not found');
        }

        $company = Company::where('token', $request->header('X-API-TOKEN'))->first();
        if (!$company) {
            abort(403, 'API token is invalid');
        }

        session()->put('company_id', $company->id);

        return $next($request);
    }
}
