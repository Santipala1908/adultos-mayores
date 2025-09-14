<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@admin.com'], // 👈 si ya existe ese correo, lo actualiza
            [
                'name' => 'Administrador',
                'password' => Hash::make('password123'), // 👈 la contraseña ya encriptada
            ]
        );
    }
}
