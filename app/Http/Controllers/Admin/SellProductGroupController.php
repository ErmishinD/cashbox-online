<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\SellProductGroup\CreateRequest;
use App\Http\Requests\Admin\SellProductGroup\UpdateRequest;
use App\Repositories\SellProductGroupRepository;
use Illuminate\Http\Request;

class SellProductGroupController extends BaseController
{
    /**
     * @var SellProductGroupRepository
     */
    private $sell_product_group;

    public function __construct()
    {
        $this->sell_product_group = app(SellProductGroupRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_groups = $this->sell_product_group->all();
        dd(__METHOD__, $product_groups);
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
        $product_group = $this->sell_product_group->get($id);
        dd(__METHOD__, $product_group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_group = $this->sell_product_group->get($id);
        dd(__METHOD__, $id);
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
        $product_group = $this->sell_product_group->get($id);
        dd(__METHOD__, $data, $product_group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_group = $this->sell_product_group->get($id);
        dd(__METHOD__, $product_group);
    }
}
