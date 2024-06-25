<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\DistrictDataTransferObject;
use App\Http\Resources\DistrictResource;
use App\Models\District;
use App\Services\DistrictService;
use Illuminate\Http\Request;

class DistrictController extends Controller
{

    public function __construct(protected DistrictService $districtService)
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


        return DistrictResource::make($this->districtService->all($filters,$perPage, DistrictDataTransferObject::class));
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
    public function show(District $district)
    {
        return DistrictResource::make($district);
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
