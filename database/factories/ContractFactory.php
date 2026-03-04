<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Collaborator;

class ContractFactory extends Factory
{
    public function definition(): array
    {
        return [
            'contract_type' => $this->faker->randomElement(['Indefinido', 'Fijo']),
            'start_date' => $this->faker->date(),
            'end_date' => null,
            'salary' => $this->faker->numberBetween(1000000, 5000000),
            'status' => 'Activo',
            'collaborator_id' => Collaborator::factory(),
        ];
    }
}