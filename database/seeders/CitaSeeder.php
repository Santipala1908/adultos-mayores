<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cita;
use App\Models\Senior;
use App\Models\User;

class CitaSeeder extends Seeder
{
    public function run(): void
    {
        $seniors = Senior::all();
        $user = User::first() ?? User::factory()->create();

        foreach ($seniors as $senior) {
            Cita::factory()->count(2)->create([
                'senior_id' => $senior->id,
                'registrado_por' => $user->id,
            ]);
        }
    }
}
