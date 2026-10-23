@extends('layouts.app')

@section('title', 'Donar | Fundación Pasos de Esperanza')
@section('meta_description', 'Apoya a la Fundación Pasos de Esperanza desde Bolivia o desde el exterior. Elige el monto, el programa y la forma de pago que te resulte más cómoda.')

@php
    /*
    |--------------------------------------------------------------------------
    | DATOS QUE DEBES COMPLETAR
    |--------------------------------------------------------------------------
    | Todo lo que dice "REEMPLAZA" son datos de ejemplo. Pon aquí los datos reales
    | de la fundación. Mientras digan "REEMPLAZA" se muestran en amarillo en la página.
    */
    $programas = [
        ['id' => 'general',    'nombre' => 'Donde más se necesite', 'desc' => 'Lo destinamos a la necesidad más urgente del momento.'],
        ['id' => 'refuerzo',   'nombre' => 'Refuerzo escolar',      'desc' => 'Apoyo pedagógico, lectura y material de estudio.'],
        ['id' => 'transporte', 'nombre' => 'Soporte y transporte',  'desc' => 'Movilidad segura para llegar a las actividades.'],
        ['id' => 'familias',   'nombre' => 'Acompañamiento familiar', 'desc' => 'Talleres y encuentros que fortalecen a las familias.'],
    ];

    $regiones = [
        'bo' => [
            'label'     => 'Desde Bolivia',
            'sub'       => 'Pagas en bolivianos (Bs)',
            'moneda'    => 'Bs',
            'sugeridos' => [30, 50, 100, 200],
            'metodos'   => [
                [
                    'id' => 'qr', 'nombre' => 'QR Simple', 'icono' => '📲', 'badge' => 'Más usado en Bolivia',
                    'resumen' => 'Escanea desde la app de cualquier banco',
                    'qr' => 'images/qr-donaciones.png', // pon aquí el QR de la fundación en public/images/
                    'pasos' => [
                        'Abre la app de tu banco y elige "Pagar con QR".',
                        'Escanea el código y escribe el monto de tu aporte.',
                        'Antes de confirmar, verifica que el titular sea Fundación Pasos de Esperanza.',
                        'Si la app lo permite, escribe tu código de referencia en el concepto.',
                    ],
                    'datos' => [],
                ],
                [
                    'id' => 'banco', 'nombre' => 'Transferencia bancaria', 'icono' => '🏦', 'badge' => null,
                    'resumen' => 'Desde la app o la web de tu banco',
                    'qr' => null,
                    'pasos' => [
                        'Haz una transferencia a la cuenta de abajo (puede ser de otro banco).',
                        'Escribe tu código de referencia en el concepto o glosa.',
                    ],
                    'datos' => [
                        'Banco'          => 'REEMPLAZA: nombre del banco',
                        'Tipo de cuenta' => 'REEMPLAZA: Caja de ahorro / Cuenta corriente',
                        'N.º de cuenta'  => 'REEMPLAZA: número de cuenta en Bs',
                        'Titular'        => 'Fundación Pasos de Esperanza',
                        'NIT'            => 'REEMPLAZA: NIT de la fundación',
                    ],
                ],
                [
                    'id' => 'billetera', 'nombre' => 'Yape o Tigo Money', 'icono' => '📱', 'badge' => null,
                    'resumen' => 'Desde tu billetera móvil',
                    'qr' => null,
                    'pasos' => [
                        'Envía tu aporte al número de abajo desde tu billetera.',
                        'Escribe tu código de referencia en el mensaje, si la app lo permite.',
                    ],
                    'datos' => [
                        'Yape'       => 'REEMPLAZA: número de Yape',
                        'Tigo Money' => 'REEMPLAZA: número de Tigo Money',
                        'A nombre de' => 'REEMPLAZA: nombre del titular',
                    ],
                ],
            ],
        ],
        'ext' => [
            'label'     => 'Desde el exterior',
            'sub'       => 'Pagas en dólares (USD)',
            'moneda'    => 'USD',
            'sugeridos' => [10, 25, 50, 100],
            'metodos'   => [
                [
                    'id' => 'swift', 'nombre' => 'Transferencia internacional', 'icono' => '🌎', 'badge' => 'Recomendado desde el exterior',
                    'resumen' => 'Desde tu banco o con servicios como Wise',
                    'qr' => null,
                    'pasos' => [
                        'En tu banco (o en un servicio de envíos como Wise) crea una transferencia internacional en dólares.',
                        'Usa los datos de abajo. Escribe tu código de referencia en el motivo del pago.',
                        'Si quieres que llegue el monto completo, pide que las comisiones corran por tu cuenta (opción "OUR").',
                    ],
                    'datos' => [
                        'Banco beneficiario'  => 'REEMPLAZA: nombre del banco en Bolivia',
                        'Código SWIFT / BIC'  => 'REEMPLAZA: código SWIFT del banco',
                        'Cuenta en USD'       => 'REEMPLAZA: número de cuenta en dólares',
                        'Titular'             => 'Fundación Pasos de Esperanza',
                        'Dirección del banco' => 'REEMPLAZA: dirección del banco, La Paz',
                        'País'                => 'Bolivia',
                        'Banco intermediario' => 'REEMPLAZA: solo si tu banco lo solicita',
                    ],
                ],
                [
                    'id' => 'remesa', 'nombre' => 'Remesa (Western Union y similares)', 'icono' => '💸', 'badge' => null,
                    'resumen' => 'Para enviar en efectivo, sin cuenta bancaria',
                    'qr' => null,
                    'pasos' => [
                        'Envía el dinero a nombre de la persona de abajo, con su nombre exacto como figura en su carnet.',
                        'Guarda el número de control de la remesa y regístralo en el paso 6.',
                    ],
                    'datos' => [
                        'Nombre del receptor' => 'REEMPLAZA: nombre completo del representante',
                        'Ciudad de retiro'    => 'La Paz',
                        'País'                => 'Bolivia',
                    ],
                ],
            ],
        ],
    ];

    $regionesJs = collect($regiones)->map(fn ($r) => ['moneda' => $r['moneda']])->all();

    $input = 'w-full rounded-xl border border-[#cfe0e2] bg-white px-4 py-3 text-sm text-[#2e5a63] placeholder:text-[#9db6bb] focus:border-[#2e5a63] focus:outline-none focus:ring-2 focus:ring-[#f1d36e]';
    $label = 'mb-1.5 block text-sm font-bold text-[#2e5a63]';
    $badgeNum = 'flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#2e5a63] text-sm font-extrabold text-[#f1d36e]';
@endphp

@section('content')
    <section class="bg-[linear-gradient(135deg,#fbfcfa_0%,#eef7f7_100%)] py-12 sm:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="max-w-3xl text-4xl font-extrabold leading-tight tracking-tight text-[#2e5a63] sm:text-5xl">
                Tu aporte abre oportunidades para un niño.
            </h1>
            <p class="mt-4 max-w-2xl text-lg leading-relaxed text-[#56737b]">
                Elige cuánto quieres aportar, a qué programa y cómo prefieres pagar. Funciona desde Bolivia y desde cualquier país.
            </p>
        </div>
    </section>

    <section class="bg-[#f6faf9] pb-20 pt-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            @if (session('donacion_ok'))
                {{-- GRACIAS --}}
                <div class="mx-auto max-w-2xl rounded-[2rem] border border-[#d8e8e9] bg-white p-8 text-center shadow-xl shadow-[#d3e5e5]/50 sm:p-12">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#f1d36e] text-3xl">❤️</div>
                    <h2 class="mt-6 text-3xl font-extrabold text-[#2e5a63]">¡Gracias por tu aporte!</h2>
                    <p class="mt-4 leading-relaxed text-[#56737b]">
                        Recibimos tu información. Revisaremos tu pago y te escribiremos al correo que dejaste para confirmarlo.
                    </p>
                    <p class="mt-6 inline-block rounded-xl bg-[#eef7f7] px-5 py-3 text-sm text-[#2e5a63]">
                        Tu código de referencia: <strong class="font-extrabold tracking-wider">{{ session('donacion_ok') }}</strong>
                    </p>
                    <div class="mt-8">
                        <a href="{{ route('home') }}" class="inline-block rounded-full bg-[#2e5a63] px-8 py-3 text-sm font-extrabold text-white transition hover:bg-[#234f57]">Volver al inicio</a>
                    </div>
                </div>
            @else
                @if ($errors->any())
                    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5 text-sm text-red-800" role="alert">
                        <p class="font-bold">Revisa estos datos antes de enviar:</p>
                        <ul class="mt-2 list-disc space-y-1 pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="form-donacion" method="POST" action="{{ route('donaciones.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" name="region" value="bo">
                    <input type="hidden" name="moneda" value="Bs">
                    <input type="hidden" name="metodo" value="">
                    <input type="hidden" name="referencia" value="">
                    {{-- Campo trampa para bots: debe quedar vacío --}}
                    <div class="hidden" aria-hidden="true">
                        <label>No llenar <input type="text" name="sitio_web" tabindex="-1" autocomplete="off"></label>
                    </div>

                    <div class="grid items-start gap-8 lg:grid-cols-[1fr_22rem]">
                        {{-- PASOS --}}
                        <div class="space-y-10 rounded-[2rem] border border-[#d8e8e9] bg-white p-6 shadow-xl shadow-[#d3e5e5]/40 sm:p-9">

                            {{-- 1. Desde dónde --}}
                            <div>
                                <div class="flex items-center gap-3">
                                    <span class="{{ $badgeNum }}">1</span>
                                    <h2 class="text-xl font-extrabold text-[#2e5a63]">¿Desde dónde donas?</h2>
                                </div>
                                <div class="mt-4 grid gap-3 sm:grid-cols-2">
                                    @foreach ($regiones as $rk => $r)
                                        <button type="button" data-region-tab="{{ $rk }}" aria-pressed="{{ $rk === 'bo' ? 'true' : 'false' }}"
                                                class="rounded-2xl border px-5 py-4 text-left transition focus:outline-none focus-visible:ring-2 focus-visible:ring-[#f1d36e] {{ $rk === 'bo' ? 'border-[#2e5a63] bg-[#2e5a63] text-white' : 'border-[#cfe0e2] bg-white text-[#2e5a63]' }}">
                                            <span class="block font-extrabold">{{ $r['label'] }}</span>
                                            <span class="mt-0.5 block text-sm opacity-80">{{ $r['sub'] }}</span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>

                            {{-- 2. Monto --}}
                            <div>
                                <div class="flex items-center gap-3">
                                    <span class="{{ $badgeNum }}">2</span>
                                    <h2 class="text-xl font-extrabold text-[#2e5a63]">¿Cuánto quieres aportar?</h2>
                                </div>
                                <p class="mt-2 text-sm text-[#617980]">Elige un monto sugerido o escribe el que prefieras.</p>

                                @foreach ($regiones as $rk => $r)
                                    <div data-presets="{{ $rk }}" class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-4 {{ $rk === 'bo' ? '' : 'hidden' }}">
                                        @foreach ($r['sugeridos'] as $valor)
                                            <button type="button" data-preset="{{ $valor }}"
                                                    class="rounded-xl border border-[#cfe0e2] bg-white px-3 py-3 text-sm font-extrabold text-[#2e5a63] transition hover:border-[#2e5a63] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#f1d36e]">
                                                {{ $r['moneda'] }} {{ $valor }}
                                            </button>
                                        @endforeach
                                    </div>
                                @endforeach

                                <div class="relative mt-3">
                                    <span data-currency class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm font-extrabold text-[#2e5a63]">Bs</span>
                                    <label for="monto" class="sr-only">Monto del aporte</label>
                                    <input id="monto" name="monto" type="number" inputmode="decimal" min="1" step="any" placeholder="Otro monto" value="{{ old('monto') }}"
                                           class="{{ $input }} pl-14 text-base font-bold">
                                </div>
                            </div>

                            {{-- 3. Destino --}}
                            <div>
                                <div class="flex items-center gap-3">
                                    <span class="{{ $badgeNum }}">3</span>
                                    <h2 class="text-xl font-extrabold text-[#2e5a63]">¿A qué programa quieres apoyar?</h2>
                                </div>
                                <p class="mt-2 text-sm text-[#617980]">Puedes elegir uno o varios.</p>
                                <div class="mt-4 grid gap-3 sm:grid-cols-2">
                                    @foreach ($programas as $p)
                                        <label class="flex cursor-pointer items-start gap-3 rounded-2xl border border-[#cfe0e2] bg-white p-4 transition has-[:checked]:border-[#2e5a63] has-[:checked]:bg-[#eef7f7] has-[:focus-visible]:ring-2 has-[:focus-visible]:ring-[#f1d36e]">
                                            <input type="checkbox" name="programas[]" value="{{ $p['nombre'] }}" data-programa="{{ $p['id'] }}" @checked($p['id'] === 'general')
                                                   class="mt-1 h-4 w-4 rounded border-[#9db6bb] text-[#2e5a63] focus:ring-[#f1d36e]">
                                            <span>
                                                <span class="block text-sm font-extrabold text-[#2e5a63]">{{ $p['nombre'] }}</span>
                                                <span class="mt-0.5 block text-xs leading-relaxed text-[#617980]">{{ $p['desc'] }}</span>
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            {{-- 4. Datos --}}
                            <div>
                                <div class="flex items-center gap-3">
                                    <span class="{{ $badgeNum }}">4</span>
                                    <h2 class="text-xl font-extrabold text-[#2e5a63]">Tus datos</h2>
                                </div>
                                <p class="mt-2 text-sm text-[#617980]">Los usamos solo para confirmar tu aporte y agradecerte.</p>
                                <div class="mt-4 grid gap-4 sm:grid-cols-2">
                                    <div>
                                        <label for="nombre" class="{{ $label }}">Nombre completo <span class="text-[#c0392b]">*</span></label>
                                        <input id="nombre" name="nombre" type="text" autocomplete="name" placeholder="Tu nombre" value="{{ old('nombre') }}" class="{{ $input }}">
                                    </div>
                                    <div>
                                        <label for="email" class="{{ $label }}">Correo electrónico <span class="text-[#c0392b]">*</span></label>
                                        <input id="email" name="email" type="email" autocomplete="email" placeholder="tucorreo@ejemplo.com" value="{{ old('email') }}" class="{{ $input }}">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="pais" class="{{ $label }}">País desde donde donas <span class="font-normal text-[#617980]">(opcional)</span></label>
                                        <input id="pais" name="pais" type="text" autocomplete="country-name" placeholder="Bolivia" value="{{ old('pais') }}" class="{{ $input }}">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="mensaje" class="{{ $label }}">Mensaje <span class="font-normal text-[#617980]">(opcional)</span></label>
                                        <textarea id="mensaje" name="mensaje" rows="3" placeholder="Deja unas palabras de aliento" class="{{ $input }}">{{ old('mensaje') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- 5. Cómo pagar --}}
                            <div>
                                <div class="flex items-center gap-3">
                                    <span class="{{ $badgeNum }}">5</span>
                                    <h2 class="text-xl font-extrabold text-[#2e5a63]">Elige cómo pagar</h2>
                                </div>

                                <div class="mt-4 rounded-xl border border-dashed border-[#b7cb77] bg-[#f7faee] px-4 py-3 text-sm text-[#2e5a63]">
                                    Tu código de referencia es <strong data-ref class="font-extrabold tracking-wider"></strong>.
                                    Escríbelo en el concepto del pago para que podamos identificarlo.
                                </div>

                                @foreach ($regiones as $rk => $r)
                                    <div data-methods="{{ $rk }}" class="mt-4 {{ $rk === 'bo' ? '' : 'hidden' }}">
                                        <div class="grid gap-3 sm:grid-cols-3">
                                            @foreach ($r['metodos'] as $m)
                                                <button type="button" data-metodo="{{ $rk }}:{{ $m['id'] }}" data-nombre="{{ $m['nombre'] }}" aria-pressed="false"
                                                        class="flex flex-col rounded-2xl border border-[#cfe0e2] bg-white p-4 text-left transition hover:border-[#2e5a63] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#f1d36e]">
                                                    <span class="text-2xl" aria-hidden="true">{{ $m['icono'] }}</span>
                                                    <span class="mt-2 text-sm font-extrabold text-[#2e5a63]">{{ $m['nombre'] }}</span>
                                                    <span class="mt-0.5 text-xs leading-relaxed text-[#617980]">{{ $m['resumen'] }}</span>
                                                    @if ($m['badge'])
                                                        <span class="mt-3 w-fit rounded-full bg-[#f1d36e]/40 px-2.5 py-1 text-[11px] font-bold text-[#6b5a1b]">{{ $m['badge'] }}</span>
                                                    @endif
                                                </button>
                                            @endforeach
                                        </div>

                                        @foreach ($r['metodos'] as $m)
                                            <div data-panel="{{ $rk }}:{{ $m['id'] }}" class="mt-4 hidden rounded-2xl border border-[#d8e8e9] bg-[#f4faf9] p-5 sm:p-6">
                                                <div class="grid gap-6 {{ $m['qr'] ? 'md:grid-cols-[13rem_1fr]' : '' }}">
                                                    @if ($m['qr'])
                                                        <div class="mx-auto w-52 shrink-0 rounded-2xl bg-white p-3 shadow-sm ring-1 ring-[#d8e8e9]">
                                                            <img src="{{ asset($m['qr']) }}" alt="Código QR para donar a Fundación Pasos de Esperanza" class="h-auto w-full">
                                                            <p class="mt-2 text-center text-[11px] font-bold text-[#617980]">Fundación Pasos de Esperanza</p>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <ol class="space-y-2 text-sm leading-relaxed text-[#56737b]">
                                                            @foreach ($m['pasos'] as $i => $paso)
                                                                <li class="flex gap-3">
                                                                    <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-white text-xs font-extrabold text-[#2e5a63] ring-1 ring-[#cfe0e2]">{{ $i + 1 }}</span>
                                                                    <span>{{ $paso }}</span>
                                                                </li>
                                                            @endforeach
                                                        </ol>

                                                        @if (count($m['datos']))
                                                            <dl class="mt-5 divide-y divide-[#d8e8e9] overflow-hidden rounded-xl border border-[#d8e8e9] bg-white">
                                                                @foreach ($m['datos'] as $k => $v)
                                                                    <div class="flex items-center justify-between gap-3 px-4 py-2.5">
                                                                        <div class="min-w-0">
                                                                            <dt class="text-xs text-[#7b9fa6]">{{ $k }}</dt>
                                                                            <dd class="break-words text-sm font-bold {{ str_starts_with($v, 'REEMPLAZA') ? 'text-amber-600' : 'text-[#2e5a63]' }}">{{ $v }}</dd>
                                                                        </div>
                                                                        <button type="button" data-copy="{{ $v }}"
                                                                                class="shrink-0 rounded-lg border border-[#cfe0e2] px-3 py-1.5 text-xs font-bold text-[#2e5a63] transition hover:bg-[#eef7f7] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#f1d36e]">Copiar</button>
                                                                    </div>
                                                                @endforeach
                                                            </dl>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>

                            {{-- 6. Confirmar --}}
                            <div>
                                <div class="flex items-center gap-3">
                                    <span class="{{ $badgeNum }}">6</span>
                                    <h2 class="text-xl font-extrabold text-[#2e5a63]">Confirma tu aporte</h2>
                                </div>
                                <p class="mt-2 text-sm text-[#617980]">Cuando hayas pagado, sube tu comprobante o escribe el número de operación. Con uno de los dos basta.</p>
                                <div class="mt-4 grid gap-4 sm:grid-cols-2">
                                    <div>
                                        <label for="comprobante" class="{{ $label }}">Comprobante <span class="font-normal text-[#617980]">(foto o PDF, máx. 5 MB)</span></label>
                                        <input id="comprobante" name="comprobante" type="file" accept="image/jpeg,image/png,application/pdf"
                                               class="block w-full rounded-xl border border-[#cfe0e2] bg-white text-sm text-[#56737b] file:mr-4 file:border-0 file:bg-[#eef7f7] file:px-4 file:py-3 file:text-sm file:font-bold file:text-[#2e5a63] hover:file:bg-[#e2f0f0]">
                                        <p data-file-msg class="mt-1.5 hidden text-xs font-bold text-[#c0392b]"></p>
                                    </div>
                                    <div>
                                        <label for="operacion" class="{{ $label }}">N.º de operación o de control</label>
                                        <input id="operacion" name="operacion" type="text" placeholder="Ej. 123456789" value="{{ old('operacion') }}" class="{{ $input }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- RESUMEN --}}
                        <aside class="rounded-[2rem] bg-[#2e5a63] p-7 text-white shadow-xl shadow-[#2e5a63]/20 lg:sticky lg:top-28">
                            <h2 class="text-xl font-extrabold">Resumen de tu aporte</h2>

                            <dl class="mt-5 space-y-4 border-t border-white/15 pt-5 text-sm">
                                <div>
                                    <dt class="text-white/60">Donas</dt>
                                    <dd data-sum-region class="mt-0.5 font-bold">Desde Bolivia</dd>
                                </div>
                                <div>
                                    <dt class="text-white/60">Programas</dt>
                                    <dd data-sum-programas class="mt-0.5 font-bold">Donde más se necesite</dd>
                                </div>
                                <div>
                                    <dt class="text-white/60">Forma de pago</dt>
                                    <dd data-sum-metodo class="mt-0.5 font-bold text-white/70">Aún no elegiste</dd>
                                </div>
                            </dl>

                            <div class="mt-6 flex items-end justify-between border-t border-white/15 pt-5">
                                <span class="text-sm text-white/70">Total a aportar</span>
                                <span data-sum-total class="text-3xl font-extrabold text-[#f1d36e]">Bs 0</span>
                            </div>

                            <button id="btn-enviar" type="submit" disabled
                                    class="mt-6 w-full rounded-full bg-[#f1d36e] px-6 py-3.5 text-sm font-extrabold text-[#2e5a63] transition enabled:hover:bg-[#f4dd8e] disabled:cursor-not-allowed disabled:opacity-50">
                                Ya realicé mi aporte
                            </button>
                            <p data-missing class="mt-3 text-xs leading-relaxed text-white/70" aria-live="polite"></p>

                            <p class="mt-5 border-t border-white/15 pt-4 text-xs leading-relaxed text-white/60">
                                Esta página no cobra por ti: pagas desde tu banco o billetera y después nos avisas aquí. Revisaremos el pago y te escribiremos para confirmarlo.
                            </p>
                        </aside>
                    </div>
                </form>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        (() => {
            const form = document.getElementById('form-donacion');
            if (!form) return;

            const $ = (s) => form.querySelector(s);
            const $$ = (s) => [...form.querySelectorAll(s)];
            const regiones = @json($regionesJs);
            const state = { region: 'bo', metodo: '', metodoNombre: '' };

            const tabOn = ['bg-[#2e5a63]', 'text-white', 'border-[#2e5a63]'];
            const tabOff = ['bg-white', 'text-[#2e5a63]', 'border-[#cfe0e2]'];
            const cardOn = ['border-[#2e5a63]', 'bg-[#eef7f7]', 'ring-2', 'ring-[#f1d36e]'];
            const cardOff = ['border-[#cfe0e2]', 'bg-white'];
            const paint = (el, on, onCls, offCls) => {
                el.classList.remove(...(on ? offCls : onCls));
                el.classList.add(...(on ? onCls : offCls));
            };

            const montoInput = $('#monto');
            const btn = $('#btn-enviar');
            const fmt = (n) => n.toLocaleString('es-BO', { maximumFractionDigits: 2 });

            // Código de referencia
            const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
            const bytes = new Uint8Array(6);
            crypto.getRandomValues(bytes);
            const referencia = 'PE-' + [...bytes].map((b) => chars[b % chars.length]).join('');
            form.elements['referencia'].value = referencia;
            $$('[data-ref]').forEach((el) => (el.textContent = referencia));

            const programas = () => $$('input[name="programas[]"]');

            const update = () => {
                const r = regiones[state.region];
                const monto = parseFloat(montoInput.value);

                $$('[data-currency]').forEach((el) => (el.textContent = r.moneda));
                $('[data-sum-total]').textContent = `${r.moneda} ${monto > 0 ? fmt(monto) : 0}`;
                $('[data-sum-region]').textContent = $(`[data-region-tab="${state.region}"] span`).textContent;

                const elegidos = programas().filter((c) => c.checked).map((c) => c.value);
                $('[data-sum-programas]').textContent = elegidos.join(', ') || 'Donde más se necesite';

                const m = $('[data-sum-metodo]');
                m.textContent = state.metodoNombre || 'Aún no elegiste';
                m.classList.toggle('text-white/70', !state.metodoNombre);

                $$('[data-preset]').forEach((b) => {
                    paint(b, parseFloat(b.dataset.preset) === monto && !b.closest('.hidden'), cardOn, cardOff);
                });

                // Qué falta para poder enviar
                const faltan = [];
                if (!(monto > 0)) faltan.push('el monto');
                if (!$('#nombre').value.trim()) faltan.push('tu nombre');
                if (!/^\S+@\S+\.\S+$/.test($('#email').value.trim())) faltan.push('un correo válido');
                if (!state.metodo) faltan.push('la forma de pago');
                if (!$('#comprobante').files.length && !$('#operacion').value.trim()) faltan.push('el comprobante o el n.º de operación');

                btn.disabled = faltan.length > 0;
                $('[data-missing]').textContent = faltan.length ? `Falta: ${faltan.join(', ')}.` : '';
            };

            const setRegion = (rk) => {
                state.region = rk;
                state.metodo = '';
                state.metodoNombre = '';
                montoInput.value = '';
                form.elements['region'].value = rk;
                form.elements['moneda'].value = regiones[rk].moneda;
                form.elements['metodo'].value = '';

                $$('[data-region-tab]').forEach((b) => {
                    const on = b.dataset.regionTab === rk;
                    b.setAttribute('aria-pressed', on);
                    paint(b, on, tabOn, tabOff);
                });
                $$('[data-presets]').forEach((el) => el.classList.toggle('hidden', el.dataset.presets !== rk));
                $$('[data-methods]').forEach((el) => el.classList.toggle('hidden', el.dataset.methods !== rk));
                $$('[data-panel]').forEach((el) => el.classList.add('hidden'));
                $$('[data-metodo]').forEach((b) => {
                    b.setAttribute('aria-pressed', 'false');
                    paint(b, false, cardOn, cardOff);
                });
                update();
            };

            const setMetodo = (btnEl) => {
                state.metodo = btnEl.dataset.metodo;
                state.metodoNombre = btnEl.dataset.nombre;
                form.elements['metodo'].value = btnEl.dataset.nombre;
                $$('[data-metodo]').forEach((b) => {
                    const on = b === btnEl;
                    b.setAttribute('aria-pressed', on);
                    paint(b, on, cardOn, cardOff);
                });
                $$('[data-panel]').forEach((el) => el.classList.toggle('hidden', el.dataset.panel !== state.metodo));
                update();
            };

            // Eventos
            $$('[data-region-tab]').forEach((b) => b.addEventListener('click', () => setRegion(b.dataset.regionTab)));
            $$('[data-preset]').forEach((b) => b.addEventListener('click', () => {
                montoInput.value = b.dataset.preset;
                update();
            }));
            $$('[data-metodo]').forEach((b) => b.addEventListener('click', () => setMetodo(b)));

            programas().forEach((c) => c.addEventListener('change', () => {
                const general = programas().find((p) => p.dataset.programa === 'general');
                if (c === general && c.checked) {
                    programas().forEach((p) => { if (p !== general) p.checked = false; });
                } else if (c.checked) {
                    general.checked = false;
                }
                if (!programas().some((p) => p.checked)) general.checked = true;
                update();
            }));

            // Copiar datos
            form.addEventListener('click', async (e) => {
                const b = e.target.closest('[data-copy]');
                if (!b) return;
                try {
                    await navigator.clipboard.writeText(b.dataset.copy);
                    b.textContent = 'Copiado';
                } catch (err) {
                    b.textContent = 'Selecciona y copia';
                }
                setTimeout(() => (b.textContent = 'Copiar'), 1600);
            });

            // Archivo
            $('#comprobante').addEventListener('change', (e) => {
                const msg = $('[data-file-msg]');
                const file = e.target.files[0];
                if (file && file.size > 5 * 1024 * 1024) {
                    e.target.value = '';
                    msg.textContent = 'El archivo supera los 5 MB. Prueba con una imagen más liviana.';
                    msg.classList.remove('hidden');
                } else {
                    msg.classList.add('hidden');
                }
                update();
            });

            ['input', 'change'].forEach((ev) => form.addEventListener(ev, update));
            update();
        })();
    </script>
@endpush
