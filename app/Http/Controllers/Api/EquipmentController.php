<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipmentCreateRequest;
use App\Http\Requests\EquipmentRequest;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Equipment\EquipmentResource;
use App\Http\Resources\Equipment\EquipmentTypeResource;
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

        $equipments = $services->index($q, $page, $perPage);

        return EquipmentResource::collection($equipments);
    }

    public function show(Equipment $equipment, EquipmentService $services)
    {
        return $services->show($equipment);
    }

    public function store(EquipmentCreateRequest $request, EquipmentService $services)
    {
        $equipments = $request->input('equipments');
        return $services->store($equipments);
    }

    public function update(Equipment $equipment, EquipmentRequest $request, EquipmentService $services)
    {
        $equipmentTypeId = $request->input('equipment_type_id');
        $serialNumber = $request->input('serial_number');
        $desc = $request->input('desc');
        $equipment = $services->update($equipment, $equipmentTypeId, $serialNumber, $desc);

        return new EquipmentResource($equipment);
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

        $equipmentsTypes = $services->type($q, $page, $perPage);

        return EquipmentTypeResource::collection($equipmentsTypes);
    }
}
