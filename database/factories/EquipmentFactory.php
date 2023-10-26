<?php

namespace Database\Factories;

use App\Models\Equipment;
use App\Models\EquipmentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Equipment::class;

    public function definition(): array
    {
        return [
            'equipment_type_id' => EquipmentType::get()->random()->id,
            'serial_number' => fake()->unique()->text(),
            'desc' => fake()->text(),
        ];
    }
}
