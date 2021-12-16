<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Cashbox\CreateRequest;
use App\Http\Requests\Admin\Cashbox\UpdateRequest;
use App\Repositories\CashboxRepository;
use App\Repositories\ShopRepository;
use Illuminate\Http\Request;

class CashboxController extends BaseController
{
    /**
     * @var CashboxRepository
     */
    private $cashbox;

    /**
     * @var ShopRepository
     */
    private $shop;

    public function __construct()
    {
        $this->cashbox = app(CashboxRepository::class);
        $this->shop = app(ShopRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashbox = $this->cashbox->all();
        dd(__METHOD__, $cashbox);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = $this->shop->getForSelect();
        $resources = $this->cashbox->getResourcces();
        $transaction_types = $this->cashbox->getTransactionTypes();
        $payment_types = $this->cashbox->getPaymentTypes();
        dd(__METHOD__, $shops, $resources, $transaction_types, $payment_types);
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
        $transaction = $this->cashbox->get($id);
        dd(__METHOD__, $transaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = $this->cashbox->get($id);
        dd(__METHOD__, $transaction);
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
        $transaction = $this->cashbox->get($id);
        dd(__METHOD__, $data, $transaction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = $this->cashbox->get($id);
        dd(__METHOD__, $transaction);
    }
}
