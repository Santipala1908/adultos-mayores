<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Notas_Salud;
use App\Models\Senior;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notas_Salud>
 */
class Notas_SaludFactory extends Factory
{
    protected $model = Notas_Salud::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'senior_id' => Senior::inRandomOrder()->first()->id ?? Senior::factory(),
            'registrado_por' => User::inRandomOrder()->first()->id ?? User::factory(),
            'observacion' => $this->faker->paragraph(),
            'fecha_nota' => $this->faker->date(),
        ];
    }
}
