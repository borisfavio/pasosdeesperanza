@extends('layouts.app')

@section('title', 'Contacto | Fundación Pasos de Esperanza')
@section('meta_description', 'Contacta a Fundación Pasos de Esperanza en La Paz, Bolivia. Súmate como voluntario, aliado o donante y conoce nuestra ubicación.')

@section('content')
    <section class="relative overflow-hidden bg-[linear-gradient(135deg,#fbfcfa_0%,#eef7f7_100%)] py-16 sm:py-20 lg:py-24">
        <div class="absolute inset-0 opacity-70" style="background-image: radial-gradient(circle at 82% 18%, rgba(241,211,110,0.28) 0, transparent 20%), radial-gradient(circle at 12% 78%, rgba(143,198,204,0.26) 0, transparent 26%);"></div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#b7cb77]">Contacto</p>
                <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-[#2e5a63] sm:text-5xl">Estamos cerca para escucharte y coordinar contigo.</h1>
                <p class="mt-5 max-w-2xl text-lg leading-relaxed text-[#56737b]">Si quieres ser voluntario, construir una alianza, hacer una donación o pedir información, déjanos tu mensaje.</p>
            </div>

            <div class="mt-12 grid grid-cols-1 gap-6 md:grid-cols-3">
                <a href="tel:69700259" class="rounded-[1.5rem] border border-[#d8e8e9] bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#eef7f7] text-2xl">📞</div>
                    <p class="mt-5 text-xs font-bold uppercase tracking-[0.16em] text-[#7b9fa6]">Teléfono</p>
                    <p class="mt-2 text-2xl font-extrabold text-[#2e5a63]">(+591)69700259</p>
                    <p class="mt-3 text-sm leading-relaxed text-[#617980]">Atención directa para coordinación y consultas.</p>
                </a>
                <a href="mailto:contacto@fundacionpasosdeesperanza.org.bo" class="rounded-[1.5rem] border border-[#d8e8e9] bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#fff8e8] text-2xl">✉️</div>
                    <p class="mt-5 text-xs font-bold uppercase tracking-[0.16em] text-[#c79f52]">Correo</p>
                    <p class="mt-2 break-words text-lg font-extrabold text-[#2e5a63]">contacto@fundacionpasosdeesperanza.org.bo</p>
                    <p class="mt-3 text-sm leading-relaxed text-[#617980]">Escríbenos y te responderemos a la brevedad.</p>
                </a>
                <div class="rounded-[1.5rem] border border-[#d8e8e9] bg-white p-7 shadow-sm">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#f2f8e9] text-2xl">📍</div>
                    <p class="mt-5 text-xs font-bold uppercase tracking-[0.16em] text-[#b7cb77]">Dirección</p>
                    <p class="mt-2 text-lg font-extrabold leading-snug text-[#2e5a63]">Zona Alto Santiago de Alcaya, Calle 4 Nro 467</p>
                    <p class="mt-3 text-sm leading-relaxed text-[#617980]">La Paz, Bolivia</p>
                </div>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-8 lg:grid-cols-[1.05fr_.95fr]">
                <div id="formulario" class="scroll-mt-28 rounded-[2rem] border border-[#d8e8e9] bg-white p-6 shadow-sm sm:p-8">
                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#b7cb77]">Escríbenos</p>
                    <h2 class="mt-3 text-2xl font-extrabold text-[#2e5a63]">Cuéntanos cómo quieres sumarte.</h2>
                    <p class="mt-3 text-sm leading-relaxed text-[#617980]">Completa el formulario y nuestro equipo se pondrá en contacto contigo.</p>

                    @if (session('success'))
                        <div class="mt-6 rounded-xl border border-[#b7cb77]/50 bg-[#f2f8e9] px-4 py-3 text-sm font-semibold text-[#46606a]" role="status">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('contacto.enviar') }}" method="POST" class="mt-7 space-y-5" novalidate>
                        @csrf
                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="nombre" class="text-sm font-bold text-[#2e5a63]">Nombre completo <span aria-hidden="true">*</span></label>
                                <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" autocomplete="name" required aria-describedby="nombre-error" class="mt-2 w-full rounded-xl border @error('nombre') border-red-400 @else border-[#cfe5e6] @enderror bg-[#fbfcfa] px-4 py-3 text-sm text-[#2e5a63] outline-none transition placeholder:text-[#9aafb3] focus:border-[#8fc6cc] focus:ring-4 focus:ring-[#8fc6cc]/20" placeholder="Tu nombre">
                                @error('nombre') <p id="nombre-error" class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="telefono" class="text-sm font-bold text-[#2e5a63]">Teléfono <span class="font-normal text-[#617980]">(opcional)</span></label>
                                <input id="telefono" name="telefono" type="tel" value="{{ old('telefono') }}" autocomplete="tel" class="mt-2 w-full rounded-xl border @error('telefono') border-red-400 @else border-[#cfe5e6] @enderror bg-[#fbfcfa] px-4 py-3 text-sm text-[#2e5a63] outline-none transition focus:border-[#8fc6cc] focus:ring-4 focus:ring-[#8fc6cc]/20" placeholder="Tu número">
                                @error('telefono') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div>
                            <label for="email" class="text-sm font-bold text-[#2e5a63]">Correo electrónico <span aria-hidden="true">*</span></label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required aria-describedby="email-error" class="mt-2 w-full rounded-xl border @error('email') border-red-400 @else border-[#cfe5e6] @enderror bg-[#fbfcfa] px-4 py-3 text-sm text-[#2e5a63] outline-none transition placeholder:text-[#9aafb3] focus:border-[#8fc6cc] focus:ring-4 focus:ring-[#8fc6cc]/20" placeholder="nombre@correo.com">
                            @error('email') <p id="email-error" class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="motivo" class="text-sm font-bold text-[#2e5a63]">¿En qué podemos ayudarte? <span aria-hidden="true">*</span></label>
                            <select id="motivo" name="motivo" required class="mt-2 w-full rounded-xl border @error('motivo') border-red-400 @else border-[#cfe5e6] @enderror bg-[#fbfcfa] px-4 py-3 text-sm text-[#2e5a63] outline-none transition focus:border-[#8fc6cc] focus:ring-4 focus:ring-[#8fc6cc]/20">
                                <option value="">Selecciona una opción</option>
                                @foreach (['voluntariado' => 'Quiero ser voluntario/a', 'alianza' => 'Quiero crear una alianza', 'dona' => 'Quiero realizar una donación', 'consulta' => 'Tengo una consulta'] as $value => $label)
                                    <option value="{{ $value }}" @selected(old('motivo', request('motivo')) === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('motivo') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="mensaje" class="text-sm font-bold text-[#2e5a63]">Mensaje <span aria-hidden="true">*</span></label>
                            <textarea id="mensaje" name="mensaje" rows="5" required aria-describedby="mensaje-help" class="mt-2 w-full resize-y rounded-xl border @error('mensaje') border-red-400 @else border-[#cfe5e6] @enderror bg-[#fbfcfa] px-4 py-3 text-sm text-[#2e5a63] outline-none transition placeholder:text-[#9aafb3] focus:border-[#8fc6cc] focus:ring-4 focus:ring-[#8fc6cc]/20" placeholder="Cuéntanos un poco más sobre tu consulta o cómo te gustaría aportar.">{{ old('mensaje') }}</textarea>
                            <p id="mensaje-help" class="mt-1.5 text-xs text-[#617980]">Mínimo 15 caracteres.</p>
                            @error('mensaje') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <button type="submit" class="w-full rounded-xl bg-[#2e5a63] px-6 py-3.5 text-sm font-extrabold text-white shadow-sm transition hover:bg-[#3f7079] focus:outline-none focus:ring-2 focus:ring-[#f1d36e] focus:ring-offset-2 sm:w-auto">Enviar mensaje</button>
                    </form>
                </div>

                <div class="overflow-hidden rounded-[2rem] border border-[#d8e8e9] bg-white shadow-sm">
                    <div class="p-6 sm:p-8">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#b7cb77]">Cómo encontrarnos</p>
                        <h2 class="mt-3 text-2xl font-extrabold text-[#2e5a63]">Estamos en La Paz.</h2>
                        <p class="mt-3 text-sm leading-relaxed text-[#617980]">Coordina tu visita antes de acercarte. Estaremos encantados de orientarte.</p>
                    </div>
                    <iframe title="Ubicación de Fundación Pasos de Esperanza en La Paz" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.1144169315194!2d-68.1350404587908!3d-16.46974314001599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f211b4d83efcd%3A0xc0f6153292b5a9fe!2sFundaci%C3%B3n%20Pasos%20de%20Esperanza!5e0!3m2!1ses!2sbo!4v1785116624125!5m2!1ses!2sbo" class="h-[340px] w-full border-0" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="border-t border-[#d8e8e9] p-5 sm:px-8">
                        <a href="https://www.google.com/maps/search/?api=1&query=Zona+Alto+Santiago+de+Alcaya%2C+Calle+4+Nro+467%2C+La+Paz%2C+Bolivia" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-sm font-extrabold text-[#2e5a63] transition hover:text-[#3f7079]">Abrir indicaciones en Google Maps <span aria-hidden="true">↗</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
