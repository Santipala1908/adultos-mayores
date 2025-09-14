<?php

namespace Database\Factories;

use App\Models\Recordatorios;
use App\Models\Senior;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecordatoriosFactory extends Factory
{
    protected $model = Recordatorios::class;

    public function definition(): array
    {
        return [
            'senior_id' => Senior::factory(),
            'titulo' => $this->faker->sentence(3),
            'descripcion' => $this->faker->text(100),
            'fecha_hora' => $this->faker->dateTimeBetween('now', '+1 month'),
            'estado' => $this->faker->randomElement(['pendiente', 'completado']),
        ];
    }
}
