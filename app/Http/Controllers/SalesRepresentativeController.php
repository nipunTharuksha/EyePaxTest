<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesRepresentativeRequest;
use App\Http\Requests\UpdateSalesRepresentativeRequest;
use App\Models\SalesRepresentative;

class SalesRepresentativeController extends Controller
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
     * @param  \App\Http\Requests\StoreSalesRepresentativeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesRepresentativeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesRepresentative  $salesRepresentative
     * @return \Illuminate\Http\Response
     */
    public function show(SalesRepresentative $salesRepresentative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesRepresentative  $salesRepresentative
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesRepresentative $salesRepresentative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesRepresentativeRequest  $request
     * @param  \App\Models\SalesRepresentative  $salesRepresentative
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesRepresentativeRequest $request, SalesRepresentative $salesRepresentative)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesRepresentative  $salesRepresentative
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesRepresentative $salesRepresentative)
    {
        //
    }
}
