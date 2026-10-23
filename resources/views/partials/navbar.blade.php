{{-- BARRA SUPERIOR: redes sociales (solo escritorio) --}}
<div class="hidden border-b border-[#d8e8e9]/70 bg-white lg:block">
    <div class="mx-auto flex h-10 max-w-7xl items-center justify-end gap-6 px-4 text-xs font-bold sm:px-6 lg:px-8" aria-label="Nuestras redes sociales">
        <a href="https://www.facebook.com/fundacionpasosdeesperanza" target="_blank" rel="noopener noreferrer"
           class="flex items-center gap-2 text-[#1877f2] transition hover:opacity-75 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#f1d36e]">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 21v-8h2.7l.4-3h-3.1V8.1c0-.9.3-1.5 1.6-1.5h1.7V3.9c-.3 0-1.3-.1-2.4-.1-2.4 0-4.1 1.5-4.1 4.2V10H7.5v3h2.8v8h3.2Z" /></svg>
            Facebook
        </a>
        <a href="https://www.instagram.com/fundacionpasosdeesperanza/" target="_blank" rel="noopener noreferrer"
           class="flex items-center gap-2 text-[#d62976] transition hover:opacity-75 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#f1d36e]">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5" /><circle cx="12" cy="12" r="4" /><circle cx="17.5" cy="6.5" r=".8" fill="currentColor" stroke="none" /></svg>
            Instagram
        </a>
        <a href="https://wa.me/59169700259" target="_blank" rel="noopener noreferrer"
           class="flex items-center gap-2 text-[#128c4a] transition hover:opacity-75 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#f1d36e]">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.5 3.5A11.8 11.8 0 0 0 12.1 0C5.6 0 .3 5.2.3 11.7c0 2.1.5 4.1 1.5 5.9L.2 24l6.6-1.7a11.7 11.7 0 0 0 5.3 1.3h.1c6.5 0 11.8-5.3 11.8-11.8 0-3.2-1.2-6.1-3.5-8.3Zm-8.4 18.1c-1.7 0-3.3-.4-4.8-1.3l-.3-.2-3.9 1 1-3.8-.2-.4a9.6 9.6 0 0 1-1.5-5.1c0-5.3 4.3-9.7 9.7-9.7 2.6 0 5 .9 6.8 2.8a9.6 9.6 0 0 1 2.8 6.8c0 5.4-4.3 9.8-9.6 9.8Zm5.3-7.3c-.3-.1-1.7-.8-2-.9-.3-.1-.5-.1-.7.1-.2.3-.8.9-.9 1.1-.2.2-.3.2-.6.1-1.8-.9-3-1.6-4.1-3.6-.3-.5.3-.5.8-1.6.1-.2 0-.4 0-.5-.1-.1-.7-1.6-.9-2.2-.2-.5-.5-.4-.7-.4h-.6c-.2 0-.5.1-.7.4-.2.3-1 1-.9 2.5 0 1.5 1 2.9 1.2 3.1.1.2 2 3.2 5 4.4 1.9.8 2.7.8 3.6.7.6-.1 1.7-.7 1.9-1.3.2-.6.2-1.2.1-1.3-.1-.1-.2-.2-.5-.3Z" /></svg>
            WhatsApp
        </a>
    </div>
</div>

{{-- BARRA PRINCIPAL --}}
<nav
    data-navbar
    class="sticky top-0 z-50 border-b border-[#d8e8e9]/80 bg-white/95 text-[#2e5a63] shadow-sm backdrop-blur transition-[background-color,border-color,box-shadow] duration-300"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-[4.75rem] items-center justify-between gap-6">
            <a href="{{ route('home') }}" class="group flex shrink-0 items-center gap-3" aria-label="Fundación Pasos de Esperanza, inicio">
                <div class="flex h-12 w-12 items-center justify-center overflow-hidden rounded-full bg-white p-0.5 shadow-sm ring-1 ring-[#cfe5e6]/80 transition group-hover:shadow-md">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo de Pasos de Esperanza" class="h-full w-full object-contain">
                </div>
                <div class="leading-tight">
                    <span class="block text-[0.95rem] font-extrabold tracking-tight text-[#2e5a63]">Pasos de Esperanza</span>
                    <span class="block pt-0.5 text-[10px] font-bold uppercase tracking-[0.14em] text-[#b7cb77]">Fundación</span>
                </div>
            </a>

            {{-- MENÚ ESCRITORIO --}}
            <div class="hidden h-full items-center gap-1 text-sm font-bold text-[#2e5a63] lg:flex">
                <a href="{{ route('home') }}"
                   class="flex h-full items-center border-b-[3px] px-3 transition hover:text-[#1d7d8c] {{ request()->routeIs('home') ? 'border-[#f1d36e]' : 'border-transparent' }}">
                    Inicio
                </a>
                <a href="{{ route('nosotros') }}" class="flex h-full items-center border-b-[3px] px-3 transition hover:text-[#1d7d8c] {{ request()->routeIs('nosotros') ? 'border-[#f1d36e]' : 'border-transparent' }}">
                    Nosotros
                </a>

                {{-- Programas con desplegable --}}
                <div class="group relative h-full">
                    <a href="{{ route('home') }}#pilares"
                       class="flex h-full items-center gap-1 border-b-[3px] border-transparent px-3 transition hover:text-[#1d7d8c]"
                       aria-haspopup="true">
                        Programas
                        <svg class="h-3.5 w-3.5 transition group-hover:rotate-180 group-focus-within:rotate-180" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m5 8 5 5 5-5" /></svg>
                    </a>
                    <div class="invisible absolute left-0 top-full w-60 translate-y-1 opacity-0 transition duration-150 group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100">
                        <div class="overflow-hidden rounded-b-xl border border-t-[3px] border-[#d8e8e9] border-t-[#f1d36e] bg-white py-2 shadow-xl shadow-[#2e5a63]/10">
                            <a href="{{ route('home') }}#pilares" class="block px-5 py-2.5 font-semibold text-[#5f7f87] transition hover:bg-[#eef7f7] hover:text-[#2e5a63]">Refuerzo escolar</a>
                            <a href="{{ route('home') }}#pilares" class="block px-5 py-2.5 font-semibold text-[#5f7f87] transition hover:bg-[#eef7f7] hover:text-[#2e5a63]">Soporte y transporte</a>
                            <a href="{{ route('home') }}#pilares" class="block px-5 py-2.5 font-semibold text-[#5f7f87] transition hover:bg-[#eef7f7] hover:text-[#2e5a63]">Acompañamiento familiar</a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('home') }}#impacto" class="flex h-full items-center border-b-[3px] border-transparent px-3 transition hover:text-[#1d7d8c]">
                    Impacto
                </a>
                <a href="{{ route('contacto') }}"
                   class="flex h-full items-center border-b-[3px] px-3 transition hover:text-[#1d7d8c] {{ request()->routeIs('contacto') ? 'border-[#f1d36e]' : 'border-transparent' }}">
                    Contáctanos
                </a>
            </div>

            {{-- BOTÓN DONAR --}}
            <a href="{{ route('donaciones') }}"
               class="hidden shrink-0 items-center gap-2 rounded-full bg-[#f1d36e] px-6 py-2.5 text-sm font-extrabold text-[#2e5a63] shadow-md shadow-[#f1d36e]/40 transition hover:-translate-y-0.5 hover:bg-[#f4dd8e] focus:outline-none focus:ring-2 focus:ring-[#f1d36e] focus:ring-offset-2 lg:inline-flex">
                Donar <span aria-hidden="true">❤️</span>
            </a>

            {{-- BOTÓN MENÚ MÓVIL --}}
            <button type="button" class="inline-flex items-center justify-center rounded-lg p-2 text-[#2e5a63] transition hover:bg-[#eef6f5] focus:outline-none focus:ring-2 focus:ring-[#f1d36e] lg:hidden" aria-expanded="false" aria-controls="mobile-menu" data-menu-toggle>
                <span class="sr-only">Abrir menú de navegación</span>
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16" /></svg>
            </button>
        </div>

        {{-- MENÚ MÓVIL --}}
        <div id="mobile-menu" class="hidden border-t border-[#d8e8e9]/70 py-3 lg:hidden" data-mobile-menu>
            <div class="flex flex-col gap-1 text-sm font-bold text-[#2e5a63]">
                <a href="{{ route('home') }}" class="rounded-lg px-3 py-2.5 hover:bg-[#eef6f5]">Inicio</a>
                <a href="{{ route('nosotros') }}" class="rounded-lg px-3 py-2.5 hover:bg-[#eef6f5]">Nosotros</a>

                <details class="group rounded-lg">
                    <summary class="flex cursor-pointer list-none items-center justify-between rounded-lg px-3 py-2.5 hover:bg-[#eef6f5] [&::-webkit-details-marker]:hidden">
                        Programas
                        <svg class="h-4 w-4 transition group-open:rotate-180" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m5 8 5 5 5-5" /></svg>
                    </summary>
                    <div class="ml-3 flex flex-col border-l-2 border-[#f1d36e] pl-2 font-semibold text-[#5f7f87]">
                        <a href="{{ route('home') }}#pilares" class="rounded-lg px-3 py-2 hover:bg-[#eef6f5]">Refuerzo escolar</a>
                        <a href="{{ route('home') }}#pilares" class="rounded-lg px-3 py-2 hover:bg-[#eef6f5]">Soporte y transporte</a>
                        <a href="{{ route('home') }}#pilares" class="rounded-lg px-3 py-2 hover:bg-[#eef6f5]">Acompañamiento familiar</a>
                    </div>
                </details>

                <a href="{{ route('home') }}#impacto" class="rounded-lg px-3 py-2.5 hover:bg-[#eef6f5]">Impacto</a>
                <a href="{{ route('contacto') }}" class="rounded-lg px-3 py-2.5 hover:bg-[#eef6f5]">Contáctanos</a>

                <div class="mt-2 flex items-center justify-center gap-2 border-y border-[#d8e8e9] py-3" aria-label="Nuestras redes sociales">
                    <a href="https://www.facebook.com/fundacionpasosdeesperanza" target="_blank" rel="noopener noreferrer" class="rounded-lg px-3 py-2 text-xs font-bold text-[#1877f2] hover:bg-[#eef6f5]">Facebook</a>
                    <a href="https://www.instagram.com/fundacionpasosdeesperanza/" target="_blank" rel="noopener noreferrer" class="rounded-lg px-3 py-2 text-xs font-bold text-[#d62976] hover:bg-[#eef6f5]">Instagram</a>
                    <a href="https://wa.me/59169700259" target="_blank" rel="noopener noreferrer" class="rounded-lg px-3 py-2 text-xs font-bold text-[#128c4a] hover:bg-[#eef6f5]">WhatsApp</a>
                </div>

                <a href="{{ route('donaciones') }}" class="mt-2 rounded-full bg-[#f1d36e] px-3 py-3 text-center font-extrabold text-[#2e5a63]">Donar ❤️</a>
            </div>
        </div>
    </div>
</nav>
