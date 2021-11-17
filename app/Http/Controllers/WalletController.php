<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWalletStockRequest;
use App\Http\Requests\UpdateWalletStockRequest;
use App\Models\WalletStock;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWalletStockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWalletStockRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WalletStock  $walletStock
     * @return \Illuminate\Http\Response
     */
    public function show(WalletStock $walletStock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WalletStock  $walletStock
     * @return \Illuminate\Http\Response
     */
    public function edit(WalletStock $walletStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWalletStockRequest  $request
     * @param  \App\Models\WalletStock  $walletStock
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWalletStockRequest $request, WalletStock $walletStock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WalletStock  $walletStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(WalletStock $walletStock)
    {
        //
    }
}
