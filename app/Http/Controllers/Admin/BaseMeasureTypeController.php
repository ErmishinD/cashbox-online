<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\BaseMeasureType\CreateRequest;
use App\Http\Requests\Admin\BaseMeasureType\UpdateRequest;
use App\Repositories\BaseMeasureTypeRepository;
use Illuminate\Http\Request;

class BaseMeasureTypeController extends BaseController
{
    /**
     * @var BaseMeasureTypeRepository
     */
    private $base_measure;

    public function __construct()
    {
        $this->base_measure = app(BaseMeasureTypeRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $base_measure_types = $this->base_measure->all();
        dd(__METHOD__, $base_measure_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = $this->base_measure->getTypes();
        dd(__METHOD__, $types);
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
        $base_measure_type = $this->base_measure->get($id);
        dd(__METHOD__, $base_measure_type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $base_measure_type = $this->base_measure->get($id);
        dd(__METHOD__, $base_measure_type);
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
        $base_measure_type = $this->base_measure->get($id);
        dd(__METHOD__, $data, $id);
//        $base_measure_type->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $base_measure_type = $this->base_measure->get($id);
        dd(__METHOD__);
        if (!empty($base_measure_type)) {
            $base_measure_type->delete();
        }
    }
}
