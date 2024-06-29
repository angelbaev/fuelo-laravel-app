<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\DimensionDataTransferObject;
use App\Http\Resources\DimensionResource;
use App\Models\Dimension;
use App\Services\DimensionService;
use Illuminate\Http\Request;

class DimensionController extends Controller
{

    public function __construct(protected DimensionService $dimensionService)
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


        return DimensionResource::make($this->dimensionService->all($filters,$perPage, DimensionDataTransferObject::class));
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
    public function show(Dimension $dimension)
    {
        return DimensionResource::make($dimension);
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
