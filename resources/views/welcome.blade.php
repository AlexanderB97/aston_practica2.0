<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aston Villa - {{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body id="inicio" class="min-h-screen flex flex-col bg-[#a9cbe8] text-[#4a0a24] antialiased">

        {{-- Header --}}
        <header class="bg-[#520a26] rounded-b-3xl shadow-lg">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('home') }}" class="flex items-center gap-3 sm:gap-4">
                    {{-- Escudo simplificado (SVG inline) --}}
                    <svg class="h-14 w-12 sm:h-20 sm:w-16 shrink-0" viewBox="0 0 64 80" fill="none" aria-hidden="true">
                        <path d="M4 6 Q32 0 60 6 V44 Q60 66 32 78 Q4 66 4 44 Z" fill="#a9cbe8" stroke="#ffffff" stroke-width="3"/>
                        <path d="M9 10 Q32 5 55 10 V43 Q55 61 32 72 Q9 61 9 43 Z" fill="none" stroke="#520a26" stroke-width="1.5"/>
                        <path d="M14 17 l1.6 3.4 3.7.4-2.8 2.5.8 3.6-3.3-1.9-3.3 1.9.8-3.6-2.8-2.5 3.7-.4Z" fill="#ffffff"/>
                        <text x="33" y="44" text-anchor="middle" font-family="ui-sans-serif, system-ui, sans-serif" font-size="22" font-weight="900" fill="#fcd34d" stroke="#520a26" stroke-width="1">AV</text>
                        <text x="32" y="58" text-anchor="middle" font-family="ui-sans-serif, system-ui, sans-serif" font-size="7" font-weight="700" fill="#520a26">1874</text>
                    </svg>
                    <span class="text-2xl sm:text-3xl font-extrabold tracking-wide text-white">ASTON VILLA</span>
                </a>

                <nav class="flex flex-wrap items-center gap-x-6 gap-y-3">
                    <a href="#inicio" class="font-semibold text-white hover:text-[#fcd34d] transition-colors">Inicio</a>
                    <a href="#sobre-nosotros" class="font-semibold text-white hover:text-[#fcd34d] transition-colors">Sobre Nosotros</a>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}"
                               class="rounded-lg bg-[#fcd34d] px-6 py-2.5 font-bold text-[#520a26] shadow hover:bg-[#fbbf24] transition-colors">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="rounded-lg bg-[#fcd34d] px-6 py-2.5 font-bold text-[#520a26] shadow hover:bg-[#fbbf24] transition-colors">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="rounded-lg border-2 border-[#fcd34d] px-5 py-2 font-bold text-[#fcd34d] hover:bg-[#fcd34d] hover:text-[#520a26] transition-colors">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </div>
        </header>

        <main class="flex-1">
            {{-- Hero --}}
            <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-12 pb-10 sm:pt-20">
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-extrabold leading-tight tracking-tight text-[#520a26]">
                    Maqueta de Práctica Inspirada en Aston
                </h1>
                <p class="mt-4 max-w-4xl text-lg sm:text-xl lg:text-2xl text-[#520a26]/90">
                    Esta es una maqueta de diseño web de práctica para uso educativo únicamente.
                </p>
            </section>

            {{-- Cards --}}
            <section id="sobre-nosotros" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-12 scroll-mt-6">
                <div class="grid gap-6 md:grid-cols-3">
                    {{-- Diseño plano moderno --}}
                    <article class="rounded-2xl bg-white p-8 text-center shadow-md">
                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-2xl bg-[#520a26]">
                            <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="#fcd34d" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="3" y="4" width="18" height="16" rx="2"/>
                                <path d="M3 9h18M8 13h5M8 16h8"/>
                            </svg>
                        </div>
                        <h2 class="mt-6 text-2xl font-bold text-[#520a26]">Diseño Plano Moderno</h2>
                        <p class="mt-3 text-[#3f3f46]">
                            Interfaz limpia y minimalista, enfocada en simplicidad y usabilidad para experiencias modernas.
                        </p>
                    </article>

                    {{-- Colores de marca --}}
                    <article class="rounded-2xl bg-white p-8 text-center shadow-md">
                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-2xl bg-[#520a26]">
                            <svg class="h-10 w-10" viewBox="0 0 24 24" fill="#fcd34d" aria-hidden="true">
                                <path d="M12 3a9 9 0 1 0 0 18c1.1 0 1.8-.8 1.8-1.7 0-.5-.2-.9-.5-1.2-.3-.3-.5-.7-.5-1.2 0-.9.8-1.7 1.7-1.7H16a5 5 0 0 0 5-5C21 6.6 17 3 12 3Z"/>
                                <circle cx="7.5" cy="11.5" r="1.4" fill="#520a26"/>
                                <circle cx="10" cy="7.5" r="1.4" fill="#520a26"/>
                                <circle cx="14.5" cy="7.5" r="1.4" fill="#520a26"/>
                                <circle cx="17" cy="11" r="1.4" fill="#520a26"/>
                            </svg>
                        </div>
                        <h2 class="mt-6 text-2xl font-bold text-[#520a26]">Colores de Marca</h2>
                        <p class="mt-3 text-[#3f3f46]">
                            Paleta inspirada en claret burgundy y azul claro pastel, con detalles en dorado amarillo para identidad visual sólida.
                        </p>
                    </article>

                    {{-- Proyecto de práctica --}}
                    <article class="rounded-2xl bg-white p-8 text-center shadow-md">
                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#8a1c45]">
                            <svg class="h-10 w-10" viewBox="0 0 24 24" fill="#a9cbe8" aria-hidden="true">
                                <path d="M12 4 1 9l11 5 9-4.1V16h2V9L12 4Z"/>
                                <path d="M5 12.2V16c0 1.7 3.1 3 7 3s7-1.3 7-3v-3.8l-7 3.2-7-3.2Z"/>
                            </svg>
                        </div>
                        <h2 class="mt-6 text-2xl font-bold text-[#520a26]">Proyecto de Práctica</h2>
                        <p class="mt-3 text-[#3f3f46]">
                            Diseñado solo para práctica y fines educativos, ejemplo de maqueta web sin uso comercial.
                        </p>
                    </article>
                </div>
            </section>
        </main>

        {{-- Footer --}}
        <footer class="px-4 pb-8 text-center text-sm sm:text-base text-[#520a26]">
            <p class="inline-flex flex-wrap items-center justify-center gap-2">
                <span class="h-2 w-2 rounded-full bg-[#520a26]"></span>
                Maqueta de práctica — No oficial — Para aprendizaje educativo únicamente.
                <span class="h-2 w-2 rounded-full bg-[#520a26]"></span>
            </p>
        </footer>
    </body>
</html>
