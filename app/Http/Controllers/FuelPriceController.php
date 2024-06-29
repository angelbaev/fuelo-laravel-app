<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\FuelPriceDataTransferObject;
use App\Http\Resources\FuelPriceResource;
use App\Models\FuelPrice;
use App\Services\FuelPriceService;
use Illuminate\Http\Request;

class FuelPriceController extends Controller
{

    public function __construct(protected FuelPriceService $fuelPriceService)
    {
    }

/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = [];
//        if ( $request->get('name', null)) {
//            $search = $request->get('name');
//            $filters[] =  ['name', 'LIKE', "%{$search}%"  ];
//        }
        $perPage = $request->get('perPage', 15);


        return FuelPriceResource::make($this->fuelPriceService->all($filters,$perPage, FuelPriceDataTransferObject::class));
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
    public function show(FuelPrice $fuelPrice)
    {
        return FuelPriceResource::make($fuelPrice);
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
