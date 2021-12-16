<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Storage\CreateRequest;
use App\Http\Requests\Admin\Storage\UpdateRequest;
use App\Repositories\ShopRepository;
use App\Repositories\StorageRepository;
use Illuminate\Http\Request;

class StorageController extends BaseController
{
    /**
     * @var StorageRepository
     */
    private $storage;

    private $shop;

    public function __construct()
    {
        $this->storage = app(StorageRepository::class);
        $this->shop = app(ShopRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $storages = $this->storage->all();
        dd(__METHOD__, $storages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = $this->shop->getForSelect();
        dd(__METHOD__, $shops);
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
        $storage = $this->storage->get($id);
        dd(__METHOD__, $storage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $storage = $this->storage->get($id);
        dd(__METHOD__, $storage);
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
        $storage = $this->storage->get($id);
        dd(__METHOD__, $data, $storage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $storage = $this->storage->get($id);
        dd(__METHOD__, $storage);
    }
}
