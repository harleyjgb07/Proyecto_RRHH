<?php

namespace Database\Factories;

use App\Models\Collaborator;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollaboratorFactory extends Factory
{
    protected $model = Collaborator::class;

    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'document_type' => 'CC',
            'document_number' => fake()->unique()->numerify('##########'),
            'birth_date' => fake()->date(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
        ];
    }
}