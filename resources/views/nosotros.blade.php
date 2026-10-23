@extends('layouts.app')

@section('title', 'Quiénes somos | Fundación Pasos de Esperanza')
@section('meta_description', 'Conoce la misión, visión, historia y equipo de la Fundación Pasos de Esperanza en La Paz, Bolivia.')

@section('content')
    <section class="relative overflow-hidden bg-[linear-gradient(135deg,#fbfcfa_0%,#eef7f7_100%)] py-16 sm:py-20 lg:py-24">
        <div aria-hidden="true" class="absolute inset-0 opacity-70" style="background-image: radial-gradient(circle at 82% 18%, rgba(241,211,110,0.28) 0, transparent 20%), radial-gradient(circle at 12% 78%, rgba(143,198,204,0.26) 0, transparent 26%);"></div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#8aa64e]">Quiénes somos</p>
                <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-[#2e5a63] sm:text-5xl">Caminamos junto a niños y familias para abrir nuevas oportunidades.</h1>
                <p class="mt-5 max-w-2xl text-lg leading-relaxed text-[#56737b]">Somos una fundación en La Paz Bolivia, que trabaja desde la cercanía, el aprendizaje y la comunidad para acompañar a cada niño en su crecimiento.</p>
                <a href="#mision-vision" class="mt-8 inline-flex rounded-full bg-[#2e5a63] px-6 py-3 text-sm font-extrabold text-white transition hover:bg-[#3f7079]">Conoce nuestro propósito <span class="ml-2" aria-hidden="true">↓</span></a>
            </div>
        </div>
    </section>

    <section id="mision-vision" class="scroll-mt-24 bg-white py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#8aa64e]">Nuestro propósito</p>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-[#2e5a63] sm:text-4xl">Lo que guía cada paso</h2>
            </div>
            <div class="mt-10 grid gap-6 md:grid-cols-2">
                <article class="rounded-[1.75rem] border border-[#d8e8e9] bg-[#f4faf9] p-7 sm:p-9">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-2xl" aria-hidden="true">🤝</div>
                    <h3 class="mt-6 text-2xl font-extrabold text-[#2e5a63]">Misión</h3>
                    <p class="mt-4 leading-relaxed text-[#617980]">Somos una fundación sin fines de lucro que coadyuva en el desarrollo integral de niños, jóvenes y familias en situación de vulnerabilidad, contribuyendo al bienestar de la sociedad a través de programas y proyectos.</p>
                </article>
                <article class="rounded-[1.75rem] border border-[#eadfb8] bg-[#fff9ee] p-7 sm:p-9">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-2xl" aria-hidden="true">🌱</div>
                    <h3 class="mt-6 text-2xl font-extrabold text-[#2e5a63]">Visión</h3>
                    <p class="mt-4 leading-relaxed text-[#617980]">Al 2031, la Fundación Pasos de Esperanza es una fundación comprometida con la restauración de relaciones familiares y el desarrollo de potencialidades de niños y jóvenes, para que sean agentes de cambio en su contexto; además, mediante la movilización de fondos internos y externos, sostiene sus propios programas y proyectos.</p>
                </article>
            </div>
            <p class="mx-auto mt-6 max-w-3xl text-center text-sm leading-relaxed text-[#7b9297]">Estas declaraciones expresan el propósito de trabajo de la Fundación Pasos de Esperanza.</p>
        </div>
    </section>

    <section class="bg-[#fbfcfa] py-16 sm:py-20" aria-labelledby="historia-titulo">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#8aa64e]">Nuestra historia</p>
                <h2 id="historia-titulo" class="mt-3 text-3xl font-extrabold tracking-tight text-[#2e5a63] sm:text-4xl">Una historia que se construye paso a paso.</h2>
                <p class="mt-4 leading-relaxed text-[#617980]">El trabajo de la Fundación nace de una convicción: la cercanía y el apoyo oportuno pueden abrir caminos para la niñez y sus familias.</p>
            </div>

            <ol class="relative mt-10 space-y-6 before:absolute before:bottom-8 before:left-[1.15rem] before:top-8 before:w-px before:bg-[#cfe5e6] md:space-y-0">
                <li class="relative grid gap-4 pl-12 md:grid-cols-[12rem_1fr] md:gap-8 md:pb-8">
                    <span class="absolute left-2 top-1 flex h-6 w-6 items-center justify-center rounded-full border-4 border-[#fbfcfa] bg-[#f1d36e] ring-1 ring-[#e5d59e]" aria-hidden="true"></span>
                    <p class="pt-1 text-sm font-extrabold uppercase tracking-wider text-[#8a9c61]">El propósito</p>
                    <div class="rounded-2xl border border-[#d8e8e9] bg-white p-6">
                        <h3 class="text-lg font-extrabold text-[#2e5a63]">Una comunidad decide acompañar</h3>
                        <p class="mt-2 text-sm leading-relaxed text-[#617980]">La Fundación reúne a personas que creen que cada niño merece apoyo, escucha y oportunidades para aprender y desarrollarse.</p>
                    </div>
                </li>
                <li class="relative grid gap-4 pl-12 md:grid-cols-[12rem_1fr] md:gap-8 md:pb-8">
                    <span class="absolute left-2 top-1 flex h-6 w-6 items-center justify-center rounded-full border-4 border-[#fbfcfa] bg-[#8fc6cc] ring-1 ring-[#b9dadd]" aria-hidden="true"></span>
                    <p class="pt-1 text-sm font-extrabold uppercase tracking-wider text-[#8a9c61]">El acompañamiento</p>
                    <div class="rounded-2xl border border-[#d8e8e9] bg-white p-6">
                        <h3 class="text-lg font-extrabold text-[#2e5a63]">Apoyo para aprender y crecer</h3>
                        <p class="mt-2 text-sm leading-relaxed text-[#617980]">El refuerzo escolar y el acompañamiento cercano se convierten en parte central del trabajo con niños y familias.</p>
                    </div>
                </li>
                <li class="relative grid gap-4 pl-12 md:grid-cols-[12rem_1fr] md:gap-8 md:pb-8">
                    <span class="absolute left-2 top-1 flex h-6 w-6 items-center justify-center rounded-full border-4 border-[#fbfcfa] bg-[#b7cb77] ring-1 ring-[#d4e0ac]" aria-hidden="true"></span>
                    <p class="pt-1 text-sm font-extrabold uppercase tracking-wider text-[#8a9c61]">La red</p>
                    <div class="rounded-2xl border border-[#d8e8e9] bg-white p-6">
                        <h3 class="text-lg font-extrabold text-[#2e5a63]">Familias, voluntariado y aliados</h3>
                        <p class="mt-2 text-sm leading-relaxed text-[#617980]">La colaboración permite sumar orientación familiar, actividades y apoyo para que los estudiantes lleguen seguros a sus espacios de aprendizaje.</p>
                    </div>
                </li>
                <li class="relative grid gap-4 pl-12 md:grid-cols-[12rem_1fr] md:gap-8">
                    <span class="absolute left-2 top-1 flex h-6 w-6 items-center justify-center rounded-full border-4 border-[#fbfcfa] bg-[#f1d36e] ring-1 ring-[#e5d59e]" aria-hidden="true"></span>
                    <p class="pt-1 text-sm font-extrabold uppercase tracking-wider text-[#8a9c61]">Hoy y adelante</p>
                    <div class="rounded-2xl border border-[#d8e8e9] bg-white p-6">
                        <h3 class="text-lg font-extrabold text-[#2e5a63]">Seguimos construyendo oportunidades</h3>
                        <p class="mt-2 text-sm leading-relaxed text-[#617980]">Desde La Paz, continuamos fortaleciendo una comunidad que acompaña a la niñez con educación, organización y esperanza.</p>
                    </div>
                </li>
            </ol>
            <p class="mt-7 text-xs leading-relaxed text-[#81969a]">La línea de tiempo presenta etapas del trabajo; no incluye fechas porque aún no se han proporcionado hitos históricos fechados.</p>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20" aria-labelledby="equipo-titulo">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#8aa64e]">Nuestro equipo</p>
                <h2 id="equipo-titulo" class="mt-3 text-3xl font-extrabold tracking-tight text-[#2e5a63] sm:text-4xl">Personas que acompañan cada proceso.</h2>
                <p class="mt-4 leading-relaxed text-[#617980]">El trabajo se hace en equipo, junto a las familias, voluntarios y aliados de la comunidad.</p>
            </div>
            <div class="relative mt-10" data-team-carousel>
                <div class="flex snap-x snap-mandatory gap-5 overflow-x-auto scroll-smooth pb-5 [scrollbar-width:thin]" data-team-track aria-label="Tarjetas del equipo">
                    @foreach ([
                        ['cargo' => 'Acompañamiento pedagógico', 'descripcion' => 'Apoya el aprendizaje, la lectura y el desarrollo de hábitos de estudio.'],
                        ['cargo' => 'Acompañamiento familiar', 'descripcion' => 'Facilita espacios de encuentro, escucha y fortalecimiento de vínculos.'],
                        ['cargo' => 'Coordinación y soporte', 'descripcion' => 'Organiza actividades y soluciones para facilitar una participación segura.'],
                        ['cargo' => 'Voluntariado y comunidad', 'descripcion' => 'Suma tiempo, conocimientos y colaboración a las iniciativas de la Fundación.'],
                    ] as $persona)
                        <article class="w-[min(85vw,20rem)] min-w-[min(85vw,20rem)] snap-start overflow-hidden rounded-2xl border border-[#d8e8e9] bg-white shadow-sm sm:min-w-[18rem] sm:max-w-[18rem]">
                            <div class="relative flex h-56 items-center justify-center bg-[linear-gradient(135deg,#e5f1ef_0%,#f7f5e9_100%)]">
                                <svg class="h-28 w-28 text-[#8fb6b2]" viewBox="0 0 120 120" fill="none" aria-hidden="true">
                                    <circle cx="60" cy="42" r="23" fill="currentColor" opacity=".75" />
                                    <path d="M19 112c2-25 17-39 41-39s39 14 41 39" fill="currentColor" opacity=".75" />
                                </svg>
                                <span class="absolute bottom-3 rounded-full bg-white/90 px-3 py-1 text-xs font-bold text-[#56737b]">Foto pendiente</span>
                            </div>
                            <div class="p-6">
                                <p class="text-xs font-bold uppercase tracking-[0.14em] text-[#8aa64e]">Nombre por confirmar</p>
                                <h3 class="mt-2 text-lg font-extrabold leading-snug text-[#2e5a63]">{{ $persona['cargo'] }}</h3>
                                <p class="mt-3 text-sm leading-relaxed text-[#617980]">{{ $persona['descripcion'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="mt-2 flex items-center justify-between gap-4">
                    <p class="text-xs text-[#81969a]">Fichas provisionales: reemplaza el nombre y la ilustración por los datos y la foto de cada integrante.</p>
                    <div class="flex shrink-0 gap-2">
                        <button type="button" class="flex h-10 w-10 items-center justify-center rounded-full border border-[#cfe5e6] bg-white text-lg font-bold text-[#2e5a63] transition hover:bg-[#eef7f7] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#f1d36e]" aria-label="Ver integrantes anteriores" data-team-prev>←</button>
                        <button type="button" class="flex h-10 w-10 items-center justify-center rounded-full border border-[#cfe5e6] bg-white text-lg font-bold text-[#2e5a63] transition hover:bg-[#eef7f7] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#f1d36e]" aria-label="Ver más integrantes" data-team-next>→</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#2e5a63] py-14 text-white sm:py-16">
        <div class="mx-auto flex max-w-7xl flex-col items-start justify-between gap-6 px-4 sm:px-6 md:flex-row md:items-center lg:px-8">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#f1d36e]">Caminemos juntos</p>
                <h2 class="mt-2 text-2xl font-extrabold sm:text-3xl">Tú también puedes ser parte de esta historia.</h2>
            </div>
            <a href="{{ route('contacto') }}" class="inline-flex shrink-0 rounded-full bg-[#f1d36e] px-7 py-3.5 text-sm font-extrabold text-[#2e5a63] transition hover:bg-[#f4dd8e]">Conoce cómo sumarte</a>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('[data-team-carousel]').forEach((carousel) => {
            const track = carousel.querySelector('[data-team-track]');
            const previous = carousel.querySelector('[data-team-prev]');
            const next = carousel.querySelector('[data-team-next]');

            const scrollCards = (direction) => {
                const card = track.querySelector('article');
                if (!card) return;
                const gap = parseFloat(getComputedStyle(track).columnGap) || 0;
                track.scrollBy({ left: direction * (card.getBoundingClientRect().width + gap), behavior: 'smooth' });
            };

            previous.addEventListener('click', () => scrollCards(-1));
            next.addEventListener('click', () => scrollCards(1));
        });
    </script>
@endpush
