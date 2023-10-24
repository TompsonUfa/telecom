<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipmentRequest;
use App\Http\Requests\FilterRequest;
use App\Models\Equipment;
use App\Services\EquipmentService;
use Illuminate\Http\Request;


class EquipmentController extends Controller
{
    public function index(FilterRequest $request, EquipmentService $services)
    {
        $q = $request->input('q');
        $page = $request->input('page');
        $perPage = $request->input('per_page');
        return $services->index($q, $page, $perPage);
    }

    public function show(Equipment $equipment, EquipmentService $services)
    {
        return $services->show($equipment);
    }

    public function store(Request $request, EquipmentService $services)
    {
        $equipments = $request->input('equipments', []);
        return $services->store($equipments);
    }

    public function update(Equipment $equipment, EquipmentRequest $request, EquipmentService $services)
    {
        $equipmentTypeId = $request->input('equipment_type_id');
        $serialNumber = $request->input('serial_number');
        $desc = $request->input('desc');

        return $services->update($equipment, $equipmentTypeId, $serialNumber, $desc);
    }

    public function destroy(Equipment $equipment, EquipmentService $services)
    {
        return $services->destroy($equipment);
    }

    public function type(FilterRequest $request, EquipmentService $services)
    {
        $q = $request->input('q');
        $page = $request->input('page');
        $perPage = $request->input('per_page');

        return $services->type($q, $page, $perPage);
    }
}
