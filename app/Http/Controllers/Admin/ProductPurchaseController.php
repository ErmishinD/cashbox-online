<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\ProductPurchase\CreateRequest;
use App\Http\Requests\Admin\ProductPurchase\UpdateRequest;
use App\Repositories\MeasureTypeRepository;
use App\Repositories\ProductPurchaseRepository;
use App\Repositories\ProductTypeRepository;
use App\Repositories\StorageRepository;
use Illuminate\Http\Request;

class ProductPurchaseController extends BaseController
{
    /**
     * @var ProductPurchaseRepository
     */
    private $product_purchase;

    /**
     * @var ProductTypeRepository
     */
    private $product_type;

    /**
     * @var StorageRepository
     */
    private $storage;

    private $measure_type;

    public function __construct()
    {
        $this->product_purchase = app(ProductPurchaseRepository::class);
        $this->product_type = app(ProductTypeRepository::class);
        $this->storage = app(StorageRepository::class);
        $this->measure_type = app(MeasureTypeRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = $this->product_purchase->all();
        dd(__METHOD__, $purchases);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $storages = $this->storage->all();
        $product_types = $this->product_type->all();
        $measure_types = $this->measure_type->all();
        dd(__METHOD__, $storages, $product_types, $measure_types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->all();
        dd(__METHOD__, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = $this->product_purchase->get($id);
        dd(__METHOD__, $purchase);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase = $this->product_purchase->get($id);
        dd(__METHOD__);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $purchase = $this->product_purchase->get($id);
        dd(__METHOD__, $data, $purchase);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = $this->product_purchase->get($id);
        dd(__METHOD__, $purchase);
    }
}
