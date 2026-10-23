@extends('layouts.app')

@section('title', 'Computación a mi Alcance | Fundación Pasos de Esperanza')
@section('meta_description', 'Conoce Computación a mi Alcance, el programa de formación tecnológica de Fundación Pasos de Esperanza en La Paz, Bolivia. Consulta la información y accede al enlace de inscripción.')

@section('content')
    @php
        /*
         * CONFIGURACIÓN:
         * Cambia '/inscripcion' por la URL real del formulario de registro.
         * También puedes enviar la variable $inscripcionUrl desde el controlador.
         */
        $enlaceInscripcion = $inscripcionUrl ?? '/inscripcion';
    @endphp

    <main>
        {{-- PORTADA --}}
        <section class="relative isolate overflow-hidden bg-[linear-gradient(135deg,#fbfcfa_0%,#eef7f7_58%,#e4f0ef_100%)] py-16 sm:py-20 lg:py-28">
            <div aria-hidden="true" class="absolute inset-0 opacity-70" style="background-image: radial-gradient(circle at 82% 18%, rgba(241,211,110,0.28) 0, transparent 20%), radial-gradient(circle at 12% 78%, rgba(143,198,204,0.26) 0, transparent 26%);"></div>
            <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-[1.1fr_.9fr] lg:px-8">
                <div>
                    <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-[#789b64]">Fundación Pasos de Esperanza · Programa educativo</p>
                    <h1 class="mt-4 max-w-3xl text-4xl font-extrabold leading-tight tracking-tight text-[#2e5a63] sm:text-5xl lg:text-6xl">
                        Aprende tecnología. <span class="text-[#7c9f65]">Abre nuevas oportunidades.</span>
                    </h1>
                    <p class="mt-6 max-w-2xl text-lg leading-relaxed text-[#56737b]">
                        <strong>Computación a mi Alcance</strong> busca fortalecer las habilidades digitales de niñas, niños y jóvenes, brindándoles herramientas útiles para sus estudios y su futuro.
                    </p>
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ $enlaceInscripcion }}" class="inline-flex items-center justify-center rounded-xl bg-[#2e5a63] px-7 py-4 text-center text-sm font-extrabold text-white shadow-sm transition hover:bg-[#3f7079] focus:outline-none focus:ring-4 focus:ring-[#8fc6cc]/50">
                            Consultar inscripción <span class="ml-2" aria-hidden="true">→</span>
                        </a>
                        <a href="#cursos" class="inline-flex items-center justify-center rounded-xl border border-[#cfe0df] bg-white/80 px-7 py-4 text-center text-sm font-extrabold text-[#2e5a63] transition hover:bg-white">
                            Conocer los cursos
                        </a>
                    </div>
                    <p class="mt-4 text-sm text-[#617980]">¿Tienes dudas? Comunícate al <a class="font-extrabold text-[#2e5a63] underline decoration-[#b7cb77] decoration-2 underline-offset-4" href="tel:+59167343323">67343323</a>.</p>
                </div>

                <div class="relative mx-auto w-full max-w-lg">
                    <div class="absolute -inset-3 rounded-[2rem] bg-[#8fc6cc]/25 blur-xl"></div>
                    <div class="relative overflow-hidden rounded-[2rem] border border-white bg-white p-5 shadow-xl sm:p-7">
                        <div class="rounded-[1.5rem] bg-[#2e5a63] p-6 text-white sm:p-8">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/15 text-3xl" aria-hidden="true">💻</div>
                            <p class="mt-6 text-xs font-bold uppercase tracking-[0.16em] text-[#dce9a9]">Aprendizaje práctico</p>
                            <h2 class="mt-2 text-2xl font-extrabold sm:text-3xl">Tus habilidades digitales empiezan aquí.</h2>
                            <p class="mt-3 text-sm leading-relaxed text-white/80">Practica, aprende paso a paso y desarrolla confianza al utilizar herramientas informáticas.</p>
                        </div>
                        <div class="grid grid-cols-3 gap-3 p-2 pt-5 text-center sm:gap-4">
                            <div class="rounded-xl bg-[#eef7f7] p-3">
                                <span class="text-2xl" aria-hidden="true">📝</span>
                                <p class="mt-2 text-xs font-extrabold text-[#2e5a63]">Word</p>
                            </div>
                            <div class="rounded-xl bg-[#f2f8e9] p-3">
                                <span class="text-2xl" aria-hidden="true">📊</span>
                                <p class="mt-2 text-xs font-extrabold text-[#2e5a63]">Excel</p>
                            </div>
                            <div class="rounded-xl bg-[#fff8e8] p-3">
                                <span class="text-2xl" aria-hidden="true">⌨️</span>
                                <p class="mt-2 text-xs font-extrabold text-[#2e5a63]">Dactilografía</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- PRESENTACIÓN --}}
        <section class="bg-white py-16 sm:py-20">
            <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">
                <div>
                    <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#b7cb77]">Sobre el programa</p>
                    <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-[#2e5a63] sm:text-4xl">La tecnología también puede estar a tu alcance.</h2>
                </div>
                <div class="space-y-4 text-base leading-relaxed text-[#617980]">
                    <p>El programa <strong class="text-[#2e5a63]">Computación a mi Alcance</strong> es una iniciativa de formación tecnológica que busca ampliar las oportunidades de aprendizaje de niñas, niños y jóvenes.</p>
                    <p>A través de cursos prácticos y del acceso a computadoras para apoyo escolar, se propone contribuir al desarrollo de competencias digitales útiles para las tareas educativas y la vida cotidiana.</p>
                    <p>La propuesta contempla la formación en grupos reducidos y el seguimiento del aprendizaje de los participantes.</p>
                </div>
            </div>
        </section>

        {{-- CURSOS --}}
        <section id="cursos" class="scroll-mt-24 bg-[#f5f9f8] py-16 sm:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#789b64]">¿Qué aprenderás?</p>
                    <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-[#2e5a63] sm:text-4xl">Herramientas para estudiar y seguir creciendo</h2>
                    <p class="mt-4 leading-relaxed text-[#617980]">El proyecto contempla cursos básicos y práctica progresiva para desarrollar habilidades con la computadora.</p>
                </div>
                <div class="mt-10 grid gap-6 md:grid-cols-3">
                    <article class="rounded-[1.5rem] border border-[#d8e8e9] bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#eef7f7] text-3xl" aria-hidden="true">📝</div>
                        <h3 class="mt-5 text-xl font-extrabold text-[#2e5a63]">Word básico</h3>
                        <p class="mt-3 text-sm leading-relaxed text-[#617980]">Aprende los fundamentos para escribir, editar y organizar documentos que te ayuden en tus actividades escolares.</p>
                    </article>
                    <article class="rounded-[1.5rem] border border-[#d8e8e9] bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#f2f8e9] text-3xl" aria-hidden="true">📊</div>
                        <h3 class="mt-5 text-xl font-extrabold text-[#2e5a63]">Excel básico</h3>
                        <p class="mt-3 text-sm leading-relaxed text-[#617980]">Conoce las hojas de cálculo y practica cómo organizar información y trabajar con datos sencillos.</p>
                    </article>
                    <article class="rounded-[1.5rem] border border-[#d8e8e9] bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#fff8e8] text-3xl" aria-hidden="true">⌨️</div>
                        <h3 class="mt-5 text-xl font-extrabold text-[#2e5a63]">Dactilografía</h3>
                        <p class="mt-3 text-sm leading-relaxed text-[#617980]">Practica la escritura con teclado mediante ejercicios progresivos para mejorar la precisión y la fluidez.</p>
                    </article>
                </div>
            </div>
        </section>

        {{-- APOYO ESCOLAR --}}
        <section class="bg-white py-16 sm:py-20">
            <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:px-8">
                <div class="rounded-[2rem] bg-[linear-gradient(135deg,#2e5a63_0%,#3f7079_100%)] p-8 text-white sm:p-10">
                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#dce9a9]">Más oportunidades para aprender</p>
                    <h2 class="mt-3 text-3xl font-extrabold">Un espacio para practicar y hacer tus tareas.</h2>
                    <p class="mt-4 leading-relaxed text-white/80">El proyecto contempla horarios de apoyo escolar con computadoras, para que los participantes puedan reforzar sus conocimientos y realizar actividades educativas.</p>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-[#2e5a63]">¿Por qué participar?</h2>
                    <ul class="mt-6 space-y-4 text-[#617980]">
                        <li class="flex gap-3"><span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#f2f8e9] font-extrabold text-[#58754a]" aria-hidden="true">✓</span><span><strong class="text-[#2e5a63]">Desarrolla habilidades digitales</strong> que pueden ayudarte durante tus estudios.</span></li>
                        <li class="flex gap-3"><span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#f2f8e9] font-extrabold text-[#58754a]" aria-hidden="true">✓</span><span><strong class="text-[#2e5a63]">Aprende con práctica</strong> y avanza gradualmente en los contenidos.</span></li>
                        <li class="flex gap-3"><span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#f2f8e9] font-extrabold text-[#58754a]" aria-hidden="true">✓</span><span><strong class="text-[#2e5a63]">Fortalece tu autonomía</strong> al utilizar herramientas informáticas.</span></li>
                    </ul>
                    <p class="mt-5 text-sm leading-relaxed text-[#617980]">La participación, los horarios y la disponibilidad de cupos deben confirmarse directamente con el equipo de la Fundación.</p>
                </div>
            </div>
        </section>

        {{-- INSCRIPCIÓN --}}
        <section id="inscripcion" class="scroll-mt-24 bg-[#eef7f7] py-16 sm:py-20">
            <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-white text-3xl shadow-sm" aria-hidden="true">📋</div>
                <p class="mt-5 text-xs font-extrabold uppercase tracking-[0.16em] text-[#789b64]">Siguiente paso</p>
                <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-[#2e5a63] sm:text-4xl">¿Te interesa participar?</h2>
                <p class="mx-auto mt-4 max-w-2xl leading-relaxed text-[#56737b]">Ingresa al enlace de inscripción para revisar el formulario y registrar tus datos. Si eres madre, padre o tutor, puedes acompañar al participante durante el proceso.</p>
                <a href="{{ $enlaceInscripcion }}" class="mt-8 inline-flex items-center justify-center rounded-xl bg-[#2e5a63] px-8 py-4 text-sm font-extrabold text-white shadow-sm transition hover:bg-[#3f7079] focus:outline-none focus:ring-4 focus:ring-[#8fc6cc]/50">
                    Ir al formulario de inscripción <span class="ml-2" aria-hidden="true">↗</span>
                </a>
                <p class="mt-4 text-sm text-[#617980]">¿El enlace no funciona o necesitas orientación? Llámanos al <a href="tel:+59167343323" class="font-extrabold text-[#2e5a63] underline underline-offset-4">67343323</a>.</p>
            </div>
        </section>

        {{-- CONTACTO --}}
        <section class="bg-white py-14">
            <div class="mx-auto flex max-w-7xl flex-col gap-6 px-4 sm:px-6 md:flex-row md:items-center md:justify-between lg:px-8">
                <div>
                    <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#b7cb77]">Fundación Pasos de Esperanza</p>
                    <h2 class="mt-2 text-2xl font-extrabold text-[#2e5a63]">Estamos para orientarte.</h2>
                    <p class="mt-2 text-sm leading-relaxed text-[#617980]">Zona Alto Santiago de Lacaya, Calle 4 N.º 467, La Paz, Bolivia.</p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row">
                    <a href="tel:+59167343323" class="inline-flex items-center justify-center rounded-xl border border-[#cfe5e6] px-5 py-3 text-sm font-extrabold text-[#2e5a63] transition hover:bg-[#f5f9f8]">📞 67343323</a>
                    <a href="https://wa.me/59167343323?text=Hola%2C%20quisiera%20recibir%20informaci%C3%B3n%20sobre%20Computaci%C3%B3n%20a%20mi%20Alcance." target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-xl bg-[#2e5a63] px-5 py-3 text-sm font-extrabold text-white transition hover:bg-[#3f7079]">Consultar por WhatsApp ↗</a>
                </div>
            </div>
        </section>
    </main>
@endsection
