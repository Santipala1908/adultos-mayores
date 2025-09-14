<?php

namespace Database\Factories;

use App\Models\Senior;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeniorFactory extends Factory
{
    protected $model = Senior::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'edad' => $this->faker->numberBetween(60, 95),
            'telefono' => $this->faker->phoneNumber(),
            'user_id' => 1, // cambia si quieres generar usuarios dinámicos
        ];
    }
}
