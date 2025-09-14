<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recordatorios;
use App\Models\Senior;

class RecordatoriosSeeder extends Seeder
{
    public function run(): void
    {
        $seniors = Senior::all();

        foreach ($seniors as $senior) {
            Recordatorios::factory()->count(3)->create([
                'senior_id' => $senior->id,
            ]);
        }
    }
}
