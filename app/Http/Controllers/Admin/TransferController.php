<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Transfer\CreateRequest;
use App\Http\Requests\Admin\Transfer\UpdateRequest;
use App\Repositories\ProductTypeRepository;
use App\Repositories\TransferRepository;
use Illuminate\Http\Request;

class TransferController extends BaseController
{
    /**
     * @var TransferRepository
     */
    private $transfer;

    /**
     * @var ProductTypeRepository
     */
    private $product_type;

    public function __construct()
    {
        $this->transfer = app(TransferRepository::class);
        $this->product_type = app(ProductTypeRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = $this->transfer->all();
        dd(__METHOD__, $transfers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_types = $this->product_type->getForSelect();
        dd(__METHOD__, $product_types);
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
        $transfer = $this->transfer->get($id);
        dd(__METHOD__, $transfer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transfer = $this->transfer->get($id);
        dd(__METHOD__, $transfer);
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
        $transfer = $this->transfer->get($id);
        dd(__METHOD__, $data, $transfer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transfer = $this->transfer->get($id);
        dd(__METHOD__, $transfer);
    }
}
