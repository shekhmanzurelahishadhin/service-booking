<?php


namespace App\Services;


use App\Models\Service;

class ServiceService
{
    public function getAll()
    {
        return Service::where('status', true)->get();
    }

    public function create(array $data)
    {
        return Service::create($data);
    }

    public function update(int $id, array $data)
    {
        $service = Service::findOrFail($id);
        $service->update($data);
        return $service;
    }

    public function delete(int $id)
    {
        Service::destroy($id);
    }
}
