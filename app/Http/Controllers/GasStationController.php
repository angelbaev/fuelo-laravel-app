<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\GasStationDataTransferObject;
use App\Http\Resources\GasStationResource;
use App\Models\GasStation;
use App\Services\GasStationService;
use Illuminate\Http\Request;

class GasStationController extends Controller
{

    public function __construct(protected GasStationService $gasStationService)
    {
    }

/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = [];
        $perPage = $request->get('perPage', 15);


        return GasStationResource::make($this->gasStationService->all($filters,$perPage));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GasStation $gasstation)
    {

        return GasStationResource::make(GasStationDataTransferObject::fromModel($gasstation));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
