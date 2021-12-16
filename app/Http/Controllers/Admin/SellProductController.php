<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\SellProduct\CreateRequest;
use App\Http\Requests\Admin\SellProduct\UpdateRequest;
use App\Repositories\SellProductRepository;
use Illuminate\Http\Request;

class SellProductController extends BaseController
{
    /**
     * @var SellProductRepository
     */
    private $sell_product;

    public function __construct()
    {
        $this->sell_product = app(SellProductRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->sell_product->all();
        dd(__METHOD__, $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(__METHOD__);
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
        $product = $this->sell_product->get($id);
        dd(__METHOD__, $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->sell_product->get($id);
        dd(__METHOD__, $product);
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
        $product = $this->sell_product->get($id);
        dd(__METHOD__, $data, $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->sell_product->get($id);
        dd(__METHOD__, $product);
    }
}
