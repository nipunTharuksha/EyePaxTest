<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesRepresentativeRequest;
use App\Http\Requests\UpdateSalesRepresentativeRequest;
use App\Models\SalesRepresentative;
use App\Models\WorkingRoute;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class SalesRepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('SalesManager/Dashboard/SalesRepresentatives/Index', [
            'salesRepresentatives' => Auth::user()->salesRepresentatives()->orderByDesc('id')
                ->with('currentWorkingRoute:id,name')->paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSalesRepresentativeRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSalesRepresentativeRequest $request): RedirectResponse
    {
        $data = $request->validated();
        request()->user()->salesRepresentatives()->create($data);
        return redirect()->route('sales-representatives.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(): Response
    {
        return Inertia::render('SalesManager/Dashboard/SalesRepresentatives/Create',
            ['currentRoutes' => WorkingRoute::all(['id', 'name'])]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SalesRepresentative $salesRepresentative
     * @return Response
     */
    public function edit(SalesRepresentative $salesRepresentative): Response
    {
        //Check is requested sales representative is belongs to auth sales manager
        $salesRepresentativeToBeEdited = auth()->user()->salesRepresentatives()->findOrFail($salesRepresentative->id);

        return Inertia::render('SalesManager/Dashboard/SalesRepresentatives/Edit',
            [
                'currentRoutes' => WorkingRoute::all(['id', 'name']),
                'salesRepresentativeToBeEdited' => $salesRepresentativeToBeEdited
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSalesRepresentativeRequest $request
     * @param SalesRepresentative $salesRepresentative
     * @return RedirectResponse
     */
    public function update(UpdateSalesRepresentativeRequest $request, SalesRepresentative $salesRepresentative): RedirectResponse
    {
        $data = $request->validated();
        //Check is requested sales representative is belongs to auth sales manager
        $salesRepresentativeToBeEdited = auth()->user()->salesRepresentatives()->findOrFail($salesRepresentative->id);
        $salesRepresentativeToBeEdited->update($data);
        return redirect()->route('sales-representatives.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SalesRepresentative $salesRepresentative
     * @return RedirectResponse
     */
    public function destroy(SalesRepresentative $salesRepresentative): RedirectResponse
    {
        auth()->user()->salesRepresentatives()->findOrFail($salesRepresentative->id)->delete();
        return redirect()->route('sales-representatives.index');
    }
}
