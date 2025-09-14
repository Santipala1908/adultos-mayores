<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Senior;

class SeniorSeeder extends Seeder
{
    public function run(): void
    {
        Senior::factory()->count(10)->create();
    }
}
