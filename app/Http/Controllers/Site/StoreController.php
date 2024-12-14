<?php

namespace App\Http\Controllers\site;

use App\Models\Store;
use Illuminate\Http\Request;
use App\services\StoresService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoresRequest;
use App\Http\Requests\UpdateStoresRequest;

class StoreController extends Controller
{

    public function __construct(
        private StoresService $service
    ) {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->service->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoresRequest $request)
    {
        return $this->service->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return $this->service->show($store);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return $this->service->edit($store);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoresRequest $request, Store $store)
    {
        return $this->service->update($request, $store);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        return $this->service->destroy($store);
    }
}
