<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // HU1.3 - Redirección por rol
    Volt::route('/estudiante/dashboard', 'dashboards.estudiante')->name('estudiante.dashboard');
    Volt::route('/docente/dashboard', 'dashboards.docente')->name('docente.dashboard');
    Volt::route('/admin/dashboard', 'dashboards.admin')->name('admin.dashboard');
});

require __DIR__.'/settings.php';
