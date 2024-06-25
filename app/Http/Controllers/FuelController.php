<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\FuelDataTransferObject;
use App\Http\Resources\FuelResource;
use App\Models\Fuel;
use App\Services\FuelService;
use Illuminate\Http\Request;

class FuelController extends Controller
{

    public function __construct(protected FuelService $fuelService)
    {
    }

/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = [];
        if ( $request->get('name', null)) {
            $search = $request->get('name');
            $filters[] =  ['name', 'LIKE', "%{$search}%"  ];
        }
        $perPage = $request->get('perPage', 15);


        return FuelResource::make($this->fuelService->all($filters,$perPage, FuelDataTransferObject::class));
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
    public function show(Fuel $fuel)
    {
        return FuelResource::make($fuel);
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
