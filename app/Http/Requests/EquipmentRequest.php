<?php

namespace App\Http\Requests;

use App\Models\EquipmentType;
use App\Rules\EquipmentNumberValidation;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EquipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $equipment = $this->route('equipment');
        $mask = EquipmentType::find($equipment['equipment_type_id'])->value('mask');
        return [
            'equipment_type_id' => ['required', 'exists:equipment_types,id'],
            'serial_number' => [
                'required',
                 new EquipmentNumberValidation($mask),
                 Rule::unique('equipment', 'serial_number')->ignore($equipment->id),
                ],
            'desc' => ['nullable', 'string'],
        ];
    }
}
