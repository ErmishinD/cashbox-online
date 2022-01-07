<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Company\CreateRequest;
use App\Http\Requests\Api\Company\UpdateRequest;
use App\Http\Resources\Api\Company\DefaultResource;
use App\Repositories\CompanyRepository;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $companies = $this->company->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($companies)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $company = $this->company->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($company)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $company = $this->company->getById($id);
        return response()->json(['success' => true, 'data' => new DefaultResource($company)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $company = $this->company->getById($id);
        $this->company->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($company)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $company = $this->company->getById($id);
        if ($company) {
            $company->delete();
        }
        return response()->json(['success' => true]);
    }
}