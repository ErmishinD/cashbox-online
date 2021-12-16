<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Shop\CreateRequest;
use App\Http\Requests\Admin\Shop\UpdateRequest;
use App\Repositories\ShopRepository;
use Illuminate\Http\Request;

class ShopController extends BaseController
{
    /**
     * @var ShopRepository
     */
    private $shop;

    public function __construct()
    {
        $this->shop = app(ShopRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = $this->shop->all();
        dd(__METHOD__);
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
        $shop = $this->shop->get($id);
        dd(__METHOD__, $shop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = $this->shop->get($id);
        dd(__METHOD__, $shop);
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
        $shop = $this->shop->get($id);
        dd(__METHOD__, $data, $shop);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = $this->shop->get($id);
        dd(__METHOD__, $shop);
    }
}
