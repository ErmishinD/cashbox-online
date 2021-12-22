<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Transfer\CreateRequest;
use App\Http\Requests\Api\Transfer\UpdateRequest;
use App\Http\Resources\Api\Transfer\DefaultResource;
use App\Repositories\TransferRepository;

class TransferController extends Controller
{
    /**
     * @var TransferRepository
     */
    private $transfer;

    public function __construct()
    {
        $this->transfer = app(TransferRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $transfers = $this->transfer->all();
        return response()->json(['success' => true, 'data' => DefaultResource::collection($transfers)]);
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
        $transfer = $this->transfer->create($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($transfer)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $transfer = $this->transfer->getById($id);
        return response()->json(['success' => true, 'data' => new DefaultResource($transfer)]);
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
        $transfer = $this->transfer->getById($id);
        $transfer->update($data);
        return response()->json(['success' => true, 'data' => new DefaultResource($transfer)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $transfer = $this->transfer->getById($id);
        if ($transfer) {
            $transfer->delete();
        }
        return response()->json(['success' => true]);
    }
}
