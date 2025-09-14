<?php

namespace Database\Factories;

use App\Models\Cita;
use App\Models\Senior;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitaFactory extends Factory
{
    protected $model = Cita::class;

    public function definition(): array
    {
        return [
            'senior_id' => Senior::factory(),
            'registrado_por' => User::factory(),
            'titulo' => 'Cita médica: ' . $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
            'fecha_hora' => $this->faker->dateTimeBetween('now', '+1 month'),
            'estado' => $this->faker->randomElement(['pendiente', 'completada', 'cancelada']),
        ];
    }
}
