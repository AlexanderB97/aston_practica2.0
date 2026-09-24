<?php

use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component
{
    //
};
?>

<div class="min-h-screen bg-zinc-50 dark:bg-zinc-900 flex items-center justify-center p-6">
    <div class="max-w-md w-full text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-red-600 mb-4">
            <span class="text-2xl font-bold text-white">{{ strtoupper(substr(Auth::user()->rol, 0, 1)) }}</span>
        </div>

        <h1 class="text-2xl font-bold text-zinc-900 dark:text-white mb-2">Panel Admin</h1>

        <p class="text-zinc-600 dark:text-zinc-400 mb-6">
            {{ __('Bienvenido/a, :name.', ['name' => Auth::user()->name]) }}
        </p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-zinc-500 hover:text-zinc-700 dark:hover:text-zinc-300 underline">
                {{ __('Cerrar sesión') }}
            </button>
        </form>
    </div>
</div>