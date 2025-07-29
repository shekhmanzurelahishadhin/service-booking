<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Services\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index(ServiceService $serviceService)
    {
        return $serviceService->getAll();
    }

    public function store(StoreServiceRequest $request, ServiceService $serviceService)
    {
        return $serviceService->create($request->validated());
    }

    public function update(StoreServiceRequest $request,ServiceService $serviceService, $id)
    {
        return $serviceService->update($id, $request->validated());
    }

    public function destroy(ServiceService $serviceService,$id)
    {
        $serviceService->delete($id);
        return response()->json(['message' => 'Service deleted successfully.']);
    }
}
