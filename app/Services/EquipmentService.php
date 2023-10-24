<?php

namespace App\Services;

use App\Http\Resources\Equipment\EquipmentResource;
use App\Http\Resources\Equipment\EquipmentTypeResource;
use App\Models\Equipment;
use App\Models\EquipmentType;
use Illuminate\Support\Facades\Validator;

class EquipmentService
{
    public function index($q, $page, $perPage)
    {
        $page = $page ?? 1;
        $perPage = $perPage ?? 10;

        $equipments = Equipment::query();

        if(isset($q)){
            $equipments->where('serial_number', 'like', "%{$q}%")
                ->orWhere('desc','like', "%{$q}%")
                ->orWhereHas('type', function ($query) use ($q) {
                    $query->where('name', 'like', "%$q%")
                        ->orWhere('mask', 'like', "%$q%");
                });
        }

        $equipments = $equipments->paginate($perPage, ['*'], 'page', $page);

        return EquipmentResource::collection($equipments);
    }

    public function show($id){
        $equipment = Equipment::find($id);

        if($equipment){
            return new EquipmentResource($equipment);
        }

    }

    public function store($equipments)
    {
        $errors = null;
        $success = null;

        foreach ($equipments as $index => $equipment){

            $validator = Validator::make($equipment, [
                'equipment_type_id' => ['required', 'exists:equipment_types,id'],
                'serial_number' => ['required', 'string', 'unique:equipment'],
                'desc' => ['nullable', 'string'],
            ]);

            if ($validator->fails()) {
                $errors[$index] = $validator->errors()->all();
            } else {

                try {
                    $equipment = Equipment::create(
                        [
                            'equipment_type_id' => $equipment['equipment_type_id'],
                            'serial_number' => $equipment['serial_number'],
                            'desc' => $equipment['desc']
                        ]);
                    $success[$index] = new EquipmentResource($equipment);
                } catch (\Exception $e) {
                        $errors[$index] = $e->getMessage();
                }

            }

        }

        return response()->json(['errors' => $errors, 'success' => $success], 200);
    }

    public function update($id, $equipmentTypeId, $serialNumber, $desc){
        $equipment = Equipment::find($id);

        if ($equipment) {

            $equipment->update([
                'equipment_type_id' => $equipmentTypeId,
                'serial_number' => $serialNumber,
                'desc' => $desc,
            ]);

            $equipment = $equipment->fresh();

            return new EquipmentResource($equipment);

        }
    }

    public function destroy($id){
        $equipment = Equipment::find($id);
        $equipment->delete();
    }

    public function type($q, $page, $perPage){
        $page = $page ?? 1;
        $perPage = $perPage ?? 10;

        $equipmentsTypes = EquipmentType::query();

        if(isset($q)){
            $equipmentsTypes->where('name', 'like', "%{$q}%")
                ->orWhere('mask', 'like', "%{$q}%");
        }

        $equipmentsTypes = $equipmentsTypes->paginate($perPage, ['*'], 'page', $page);

        return EquipmentTypeResource::collection($equipmentsTypes);
    }
}
