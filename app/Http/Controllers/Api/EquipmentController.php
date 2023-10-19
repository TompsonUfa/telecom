<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipmentRequest;
use App\Services\EquipmentServices;


class EquipmentController extends Controller
{
    public function index(EquipmentRequest $request, EquipmentServices $services)
    {
        $search = $request->input('q');
        return $services->index($search);
    }

    public function show($id)
    {

    }

    public function store(EquipmentRequest $request, EquipmentServices $services)
    {

    }

    public function update($id, EquipmentRequest $request, EquipmentServices $services)
    {

    }

    public function destroy($id, EquipmentServices $services)
    {

    }

    public function type()
    {

    }
}
