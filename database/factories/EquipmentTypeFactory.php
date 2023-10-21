<?php

namespace Database\Factories;

use App\Models\EquipmentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EquipmentType>
 */
class EquipmentTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = EquipmentType::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->text(40),
            'mask' => fake()->regexify('[NAaX0-9Z@_\-]{10}'),
        ];
    }
}
