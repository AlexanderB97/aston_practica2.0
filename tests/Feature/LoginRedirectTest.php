<?php

use App\Models\User;

test('admin es redirigido a admin.dashboard tras login', function () {
    $admin = User::factory()->create([
        'email' => 'admin@academia.test',
        'password' => bcrypt('password123'),
        'rol' => 'admin',
    ]);

    $this->post('/login', [
        'email' => 'admin@academia.test',
        'password' => 'password123',
    ])->assertRedirect(route('admin.dashboard'));
});

test('docente es redirigido a docente.dashboard tras login', function () {
    User::factory()->create([
        'email' => 'docente@academia.test',
        'password' => bcrypt('password123'),
        'rol' => 'docente',
    ]);

    $this->post('/login', [
        'email' => 'docente@academia.test',
        'password' => 'password123',
    ])->assertRedirect(route('docente.dashboard'));
});

test('estudiante es redirigido a estudiante.dashboard tras login', function () {
    User::factory()->create([
        'email' => 'estudiante@academia.test',
        'password' => bcrypt('password123'),
        'rol' => 'estudiante',
    ]);

    $this->post('/login', [
        'email' => 'estudiante@academia.test',
        'password' => 'password123',
    ])->assertRedirect(route('estudiante.dashboard'));
});