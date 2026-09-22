<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesUsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Academia',
            'email' => 'admin@academia.test',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'rol' => 'admin',
        ]);

        User::create([
            'name' => 'Docente Prueba',
            'email' => 'docente@academia.test',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'rol' => 'docente',
        ]);

        User::create([
            'name' => 'Estudiante Prueba',
            'email' => 'estudiante@academia.test',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'rol' => 'estudiante',
        ]);
    }
}