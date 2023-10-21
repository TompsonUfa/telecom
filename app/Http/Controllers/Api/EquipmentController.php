<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipmentRequest;
use App\Services\EquipmentServices;
use Illuminate\Http\Request;


class EquipmentController extends Controller
{
    public function index(Request $request, EquipmentServices $services)
    {
        $q = $request->input('q');
        $page = $request->input('page');
        $perPage = $request->input('per_page');

        return $services->index($q, $page, $perPage);
    }

    public function show($id, EquipmentServices $services)
    {
        return $services->show($id);
    }

    public function store(Request $request, EquipmentServices $services)
    {
        $equipments = $request->input('equipments', []);
        return $services->store($equipments);
    }

    public function update($id, EquipmentRequest $request, EquipmentServices $services)
    {
        $equipmentTypeId = $request->input('equipment_type_id');
        $serialNumber = $request->input('serial_number');
        $desc = $request->input('desc');

        return $services->update($id, $equipmentTypeId, $serialNumber, $desc);
    }

    public function destroy($id, EquipmentServices $services)
    {
        return $services->delete($id);
    }

    public function type(Request $request, EquipmentServices $services)
    {

        $q = $request->input('q');
        $page = $request->input('page');
        $perPage = $request->input('per_page');

        return $services->type($q, $page, $perPage);
    }
}
