<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CreateRequest;
use App\Http\Requests\Api\Company\UpdateRequest;
use App\Http\Resources\Api\Company\DefaultResource;
use App\Http\Resources\Api\Company\ShowResource;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\JsonResponse;

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

    public function index(): JsonResponse
    {
        $companies = $this->company->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($companies)]);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $data = $request->validated();
        $company = $this->company->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($company)], 201);
    }

    public function show(Company $company): JsonResponse
    {
        $company->load(['shops', 'employees.roles']);
        return response()->json(['success' => true, 'data' => new ShowResource($company)]);
    }

    public function update(UpdateRequest $request, Company $company): JsonResponse
    {
        $data = $request->validated();
        $company->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($company)], 202);
    }

    public function destroy(Company $company): JsonResponse
    {
        $company->delete();
        return response()->json(['success' => true], 202);
    }
}
