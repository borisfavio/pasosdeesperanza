@extends('layouts.app')

@section('title', 'Fundación Pasos de Esperanza | Transformando Futuros')
@section('meta_description', 'Fundación Pasos de Esperanza en La Paz, Bolivia: apoyo pedagógico, acompañamiento familiar y comunidad para que cada niño pueda crecer con oportunidades.')



@section('content')
    {{-- HERO A PANTALLA COMPLETA --}}
<section
    class="relative isolate flex min-h-[calc(100svh-5rem)] flex-col overflow-hidden bg-[#234f57] text-white"
>
    {{-- CONTENEDOR DE IMÁGENES CON ANIMACIÓN Y ZOOM --}}
    <div class="absolute inset-0 -z-20 overflow-hidden">
        @foreach ($heroImages as $index => $slide)
            <img
                src="{{ $slide }}"
                alt="Niños y familias de la fundación reunidos al aire libre"
                class="absolute inset-0 h-full w-full object-cover transition-opacity duration-1000 ease-in-out"
                data-hero-slide
                style="opacity: {{ $index === 0 ? '1' : '0' }}; transform: scale({{ $index === 0 ? '1.05' : '1' }});"
                loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
            >
        @endforeach
    </div>

    {{-- CAPA DE SUPERPOSICIÓN (OVERLAY) --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-[#234f57]/70 via-[#234f57]/55 to-[#234f57]/90"></div>

    {{-- CONTENIDO PRINCIPAL --}}
    <div class="mx-auto flex w-full max-w-4xl flex-1 flex-col items-center justify-center px-4 py-16 text-center sm:px-6 sm:py-24">
        <h1 class="text-4xl font-extrabold leading-[1.08] tracking-tight sm:text-6xl lg:text-7xl">
            Construimos <span class="text-[#f1d36e]">oportunidades</span> con cercanía y esperanza.
        </h1>
        <p class="mt-6 max-w-2xl text-base leading-relaxed text-white/85 sm:text-lg">
            Acompañamos a niños y familias de La Paz con apoyo pedagógico, organización comunitaria y espacios seguros para crecer con más tranquilidad.
        </p>
        <div class="mt-9 flex w-full flex-col justify-center gap-3 sm:w-auto sm:flex-row">
            <a href="{{ route('donaciones') }}"
               class="rounded-full bg-[#f1d36e] px-8 py-3.5 text-center text-sm font-extrabold text-[#2e5a63] shadow-lg shadow-black/20 transition hover:bg-[#f4dd8e] focus:outline-none focus-visible:ring-4 focus-visible:ring-[#f1d36e]/50">
                Quiero ayudar
            </a>
            <a href="#pilares"
               class="rounded-full border border-white/70 px-8 py-3.5 text-center text-sm font-bold text-white transition hover:bg-white/15 focus:outline-none focus-visible:ring-4 focus-visible:ring-white/40">
                Ver nuestros programas
            </a>
        </div>
    </div>

    {{-- CIFRAS DE IMPACTO --}}
    <div id="impacto" class="mx-auto w-full max-w-4xl px-4 pb-8 sm:px-6 sm:pb-10">
        <dl class="grid grid-cols-3 divide-x divide-white/25 border-t border-white/25 pt-6">
            @foreach ($stats as $stat)
                <div class="px-2 text-center sm:px-6">
                    <dt class="order-2 mt-1 text-xs text-white/75 sm:text-sm">{{ $stat['label'] }}</dt>
                    <dd class="text-3xl font-extrabold text-[#f1d36e] sm:text-4xl"
                        data-count="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] }}">
                        {{ $stat['value'] }}{{ $stat['suffix'] }}
                    </dd>
                </div>
            @endforeach
        </dl>
    </div>
</section>

    {{-- PROPÓSITO --}}
    <section class="bg-[linear-gradient(135deg,#fbfcfa_0%,#eef7f7_100%)] py-16 sm:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <p class="text-2xl font-semibold leading-relaxed text-[#2e5a63] sm:text-3xl">
                “Que el contexto de un niño nunca defina el alcance de sus sueños.”
            </p>
            <div class="grid gap-4 sm:grid-cols-2">
                <div class="rounded-2xl bg-[#f4faf9] p-5">
                    <p class="font-bold text-[#2e5a63]">Acompañamiento</p>
                    <p class="mt-2 text-sm leading-relaxed text-[#56737b]">Presencia constante para sostener procesos de aprendizaje y bienestar.</p>
                </div>
                <div class="rounded-2xl bg-[#fff9ee] p-5">
                    <p class="font-bold text-[#2e5a63]">Red de apoyo</p>
                    <p class="mt-2 text-sm leading-relaxed text-[#56737b]">Aliados, familias y voluntariado trabajando en una misma dirección.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CARRUSEL DE HISTORIAS --}}
    <section aria-label="Historias de nuestra comunidad" class="bg-[#fbfcfa] py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#b7cb77]">Nuestra comunidad</p>
                    <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-[#2e5a63] sm:text-4xl">Pequeños pasos, grandes historias</h2>
                </div>
                <p class="max-w-md text-sm leading-relaxed text-[#617980]">Cada actividad abre una posibilidad: aprender, compartir y crecer acompañados.</p>
            </div>

            <div class="group relative overflow-hidden rounded-[2rem] border border-[#d8e8e9] bg-white shadow-xl shadow-[#d3e5e5]/50" data-carousel>
                <div class="relative aspect-[4/3] overflow-hidden sm:aspect-[16/8] lg:aspect-[2.35/1]">
                    <article class="absolute inset-0 opacity-100 transition-opacity duration-700 ease-out" data-slide aria-hidden="false">
                        <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1800&q=85" alt="Docente acompañando a un grupo de estudiantes" class="h-full w-full object-cover" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#234f57]/92 via-[#234f57]/48 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-7 text-white sm:p-10">
                            <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#f1d36e]">Educación que acompaña</p>
                            <h3 class="mt-2 max-w-xl text-2xl font-extrabold sm:text-3xl">Aprender con confianza abre nuevos caminos.</h3>
                        </div>
                    </article>
                    <article class="pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-700 ease-out" data-slide aria-hidden="true">
                        <img src="https://images.unsplash.com/photo-1502082553048-f009c37129b9?auto=format&fit=crop&w=1800&q=85" alt="Niños compartiendo una actividad al aire libre" class="h-full w-full object-cover" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#234f57]/92 via-[#234f57]/48 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-7 text-white sm:p-10">
                            <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#f1d36e]">Presencia y cercanía</p>
                            <h3 class="mt-2 max-w-xl text-2xl font-extrabold sm:text-3xl">Una red de apoyo para avanzar juntos.</h3>
                        </div>
                    </article>
                    <article class="pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-700 ease-out" data-slide aria-hidden="true">
                        <img src="https://images.unsplash.com/photo-1497486751825-1233686d5d80?auto=format&fit=crop&w=1800&q=85" alt="Estudiantes participando en una clase" class="h-full w-full object-cover" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#234f57]/92 via-[#234f57]/48 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-7 text-white sm:p-10">
                            <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#f1d36e]">Comunidad que cuida</p>
                            <h3 class="mt-2 max-w-xl text-2xl font-extrabold sm:text-3xl">Espacios para descubrir, compartir y crecer.</h3>
                        </div>
                    </article>
                </div>
                <div class="absolute right-4 top-4 flex gap-2 sm:right-6 sm:top-6">
                    <button type="button" class="flex h-10 w-10 items-center justify-center rounded-full bg-white/95 text-[#2e5a63] shadow-sm transition hover:bg-[#f1d36e]" aria-label="Imagen anterior" data-carousel-prev>←</button>
                    <button type="button" class="flex h-10 w-10 items-center justify-center rounded-full bg-white/95 text-[#2e5a63] shadow-sm transition hover:bg-[#f1d36e]" aria-label="Imagen siguiente" data-carousel-next>→</button>
                </div>
                <div class="absolute bottom-4 right-5 flex gap-2 sm:bottom-6 sm:right-7" role="tablist" aria-label="Seleccionar imagen">
                    <button class="h-2.5 w-7 rounded-full bg-[#f1d36e] transition" type="button" aria-label="Ver imagen 1" aria-selected="true" data-carousel-dot></button>
                    <button class="h-2.5 w-2.5 rounded-full bg-[#8fc6cc]/70 transition" type="button" aria-label="Ver imagen 2" aria-selected="false" data-carousel-dot></button>
                    <button class="h-2.5 w-2.5 rounded-full bg-[#8fc6cc]/70 transition" type="button" aria-label="Ver imagen 3" aria-selected="false" data-carousel-dot></button>
                </div>
            </div>
        </div>
    </section>

    {{-- PROGRAMAS --}}
    <section id="pilares" class="bg-white py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#b7cb77]">Lo que hacemos</p>
                <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-[#2e5a63] sm:text-4xl">Programas con propósito</h2>
                <p class="mt-4 leading-relaxed text-[#617980]">Convertimos necesidades concretas en acompañamiento constante, cercano y humano.</p>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-5 md:grid-cols-3">
                @forelse ($programs as $program)
                    <article class="border border-[#d8e8e9] bg-white p-7 shadow-sm">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#eef7f7] text-xl">{{ $program->icon ?: '🌱' }}</div>
                        <h3 class="mt-5 text-xl font-extrabold text-[#2e5a63]">{{ $program->name }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-[#617980]">{{ $program->description }}</p>
                    </article>
                @empty
                    <p class="text-[#617980] md:col-span-3">Estamos preparando nuestros programas. Pronto encontrarás más información.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- QUIÉNES SOMOS --}}
    <section id="nosotros" class="bg-[#fbfcfa] py-16 sm:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">
            <div class="border-l-4 border-[#f1d36e] pl-6">
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#b7cb77]">Quiénes somos</p>
                <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-[#2e5a63] sm:text-4xl">Una fundación que trabaja desde la cercanía.</h2>
            </div>
            <p class="leading-relaxed text-[#617980]">
                Creemos en el poder de una comunidad que se organiza para cuidar. Por eso articulamos voluntariado, familias y aliados alrededor de oportunidades reales para la niñez.
            </p>
        </div>
    </section>

    {{-- LLAMADO A LA ACCIÓN --}}
    <section class="bg-[#2e5a63] py-16 text-white">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#f1d36e]">Tu participación importa</p>
            <h2 class="mt-3 text-3xl font-extrabold sm:text-4xl">Súmate a una red que hace la diferencia.</h2>
            <p class="mx-auto mt-4 max-w-2xl leading-relaxed text-white/75">
                Como voluntario, aliado o donante, puedes ayudar a que más niños encuentren apoyo y posibilidades.
            </p>
            <a href="{{ route('contacto') }}" class="mt-8 inline-block rounded-full bg-[#f1d36e] px-8 py-3.5 text-sm font-extrabold text-[#2e5a63] transition hover:bg-[#f4dd8e]">
                Ponte en contacto
            </a>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Carrusel del hero sin depender de Alpine.js.
        (() => {
            const slides = [...document.querySelectorAll('[data-hero-slide]')];
            if (slides.length < 2) return;

            let active = 0;
            setInterval(() => {
                slides[active].style.opacity = '0';
                slides[active].style.transform = 'scale(1)';
                active = (active + 1) % slides.length;
                slides[active].style.opacity = '1';
                slides[active].style.transform = 'scale(1.05)';
            }, 6000);
        })();

        // Contador animado de cifras (se activa al llegar a la sección)
        (() => {
            const counters = document.querySelectorAll('[data-count]');
            const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            const run = (el) => {
                const target = Number(el.dataset.count) || 0;
                const suffix = el.dataset.suffix || '';
                if (reduceMotion || target === 0) {
                    el.textContent = target + suffix;
                    return;
                }
                const duration = 1600;
                const start = performance.now();
                const tick = (now) => {
                    const progress = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    el.textContent = Math.round(target * eased) + suffix;
                    if (progress < 1) requestAnimationFrame(tick);
                };
                requestAnimationFrame(tick);
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        run(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.6 });

            counters.forEach((el) => observer.observe(el));
        })();

        // Carrusel
        document.querySelectorAll('[data-carousel]').forEach((carousel) => {
            const slides = [...carousel.querySelectorAll('[data-slide]')];
            const dots = [...carousel.querySelectorAll('[data-carousel-dot]')];
            let active = 0;
            let timer;

            const showSlide = (next) => {
                active = (next + slides.length) % slides.length;
                slides.forEach((slide, index) => {
                    const isActive = index === active;
                    slide.classList.toggle('opacity-100', isActive);
                    slide.classList.toggle('opacity-0', !isActive);
                    slide.classList.toggle('pointer-events-none', !isActive);
                    slide.setAttribute('aria-hidden', !isActive);
                    dots[index].className = `rounded-full transition ${isActive ? 'h-2.5 w-7 bg-[#f1d36e]' : 'h-2.5 w-2.5 bg-[#8fc6cc]/70'}`;
                    dots[index].setAttribute('aria-selected', isActive);
                });
            };

            const restart = () => {
                clearInterval(timer);
                timer = setInterval(() => showSlide(active + 1), 6000);
            };

            carousel.querySelector('[data-carousel-prev]').addEventListener('click', () => {
                showSlide(active - 1);
                restart();
            });

            carousel.querySelector('[data-carousel-next]').addEventListener('click', () => {
                showSlide(active + 1);
                restart();
            });

            dots.forEach((dot, index) => dot.addEventListener('click', () => {
                showSlide(index);
                restart();
            }));

            carousel.addEventListener('mouseenter', () => clearInterval(timer));
            carousel.addEventListener('mouseleave', restart);
            restart();
        });
    </script>
@endpush
