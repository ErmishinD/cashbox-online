<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\MeasureType\CreateRequest;
use App\Http\Requests\Admin\MeasureType\UpdateRequest;
use App\Repositories\BaseMeasureTypeRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\MeasureTypeRepository;
use Illuminate\Http\Request;

class MeasureTypeController extends BaseController
{
    /**
     * @var MeasureTypeRepository
     */
    private $measure_type;

    /**
     * @var BaseMeasureTypeRepository
     */
    private $base_measure_type;

    public function __construct()
    {
        $this->measure_type = app(MeasureTypeRepository::class);
        $this->base_measure_type = app(BaseMeasureTypeRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measure_types = $this->measure_type->all();
        dd(__METHOD__, $measure_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $base_measure_types = $this->base_measure_type->getForSelect();
        dd(__METHOD__, $base_measure_types);
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
        $measure_type = $this->measure_type->get($id);
        dd(__METHOD__, $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $measure_type = $this->measure_type->get($id);
        dd(__METHOD__, $measure_type);
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
        $measure_type = $this->measure_type->get($id);
        dd(__METHOD__, $data, $measure_type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $measure_type = $this->measure_type->get($id);
        dd(__METHOD__);
    }
}
