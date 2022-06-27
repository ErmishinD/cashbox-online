<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Company\UpdateRequest;
use App\Http\Resources\Api\Company\DefaultResource;
use App\Http\Resources\Api\Company\ShowResource;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\JsonResponse;

/**
 * @authenticated
 * @group Company management
 */
class CompanyController extends Controller
{
    /**
     * @var CompanyRepository
     */
    private $company;

    public function __construct()
    {
        $this->company = app(CompanyRepository::class);
    }

    public function show(Company $company): JsonResponse
    {
        $this->authorize('Company_show');

        $company->load(['shops', 'employees.roles']);
        return response()->json(['success' => true, 'data' => new ShowResource($company)]);
    }

    public function update(UpdateRequest $request, Company $company): JsonResponse
    {
        $this->authorize('Company_edit');

        $data = $request->validated();
        $company->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($company)], 202);
    }
}
