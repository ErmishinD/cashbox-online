<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\ProductType\CreateRequest;
use App\Http\Requests\Admin\ProductType\UpdateRequest;
use App\Repositories\BaseMeasureTypeRepository;
use App\Repositories\ProductTypeRepository;
use Illuminate\Http\Request;

class ProductTypeController extends BaseController
{
    /**
     * @var ProductTypeRepository
     */
    private $product_type;

    /**
     * @var BaseMeasureTypeRepository
     */
    private $base_measure_type;

    public function __construct()
    {
        $this->product_type = app(ProductTypeRepository::class);
        $this->base_measure_type = app(BaseMeasureTypeRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_types = $this->product_type->all();
        dd(__METHOD__, $product_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $base_measure_types = $this->base_measure_type->getForSelect();
        $types = $this->product_type->getTypes();
        dd(__METHOD__, $base_measure_types, $types);
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
        $product_type = $this->product_type->get($id);
        dd(__METHOD__, $product_type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_type = $this->product_type->get($id);
        dd(__METHOD__, $product_type);
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
        $product_type = $this->product_type->get($id);
        dd(__METHOD__, $data, $product_type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_type = $this->product_type->get($id);
        dd(__METHOD__, $product_type);
    }
}
