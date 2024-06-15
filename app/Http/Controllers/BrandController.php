<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Services\BrandService;
use App\Infrastructure\Repositories\BrandRepository;
use App\Http\Resources\BrandResource;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    
    public function __construct(protected BrandService $brandService) 
    {
    }    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BrandResource::make($this->brandService->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Brand $brand)
    {
        return BrandResource::make($brand);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {

        $validated = $request->validated();

        $brand = $this->brandService->create($validated);

        return BrandResource::make($brand);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return BrandResource::make($brand);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return BrandResource::make($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $validated = $request->validated();

        $brand = $this->brandService->update($validated, $brand->id);

        return BrandResource::make($brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $this->brandService->delete($brand->id);
    }
}
