@extends('layouts.app')

@section('title', 'Dashboard | Pasos de Esperanza')

@section('content')
<section class="min-h-screen bg-[#f4faf9] py-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div><p class="text-xs font-bold uppercase tracking-[0.16em] text-[#8aa64e]">Panel de control</p><h1 class="mt-2 text-4xl font-extrabold text-[#2e5a63]">Contenido de la fundación</h1><p class="mt-2 text-[#617980]">Actualiza la información pública desde un solo lugar.</p></div>
            <form method="POST" action="{{ route('logout') }}">@csrf<button class="rounded-full border border-[#cfe5e6] bg-white px-5 py-2.5 text-sm font-bold text-[#2e5a63] hover:bg-[#eef7f7]">Cerrar sesión</button></form>
        </div>
        @if (session('success')) <div class="mt-6 rounded-xl border border-green-200 bg-green-50 p-4 text-sm font-semibold text-green-800">{{ session('success') }}</div> @endif

        <div class="mt-8 grid gap-6 lg:grid-cols-2">
            <article class="rounded-3xl border border-[#d8e8e9] bg-white p-6 shadow-sm">
                <h2 class="text-2xl font-extrabold text-[#2e5a63]">Programas</h2>
                <form method="POST" action="{{ route('dashboard.programs.store') }}" class="mt-5 space-y-3">@csrf
                    <input name="name" required placeholder="Nombre del programa" class="w-full rounded-xl border-[#cfe5e6]">
                    <textarea name="description" required placeholder="Descripción" rows="3" class="w-full rounded-xl border-[#cfe5e6]"></textarea>
                    <input name="icon" placeholder="Emoji opcional" class="w-full rounded-xl border-[#cfe5e6]">
                    <button class="rounded-full bg-[#2e5a63] px-5 py-2.5 text-sm font-bold text-white">Agregar programa</button>
                </form>
                <div class="mt-6 space-y-3">@forelse ($programs as $program)<div class="flex items-start justify-between gap-3 rounded-xl bg-[#f4faf9] p-4"><div><p class="font-bold text-[#2e5a63]">{{ $program->icon }} {{ $program->name }}</p><p class="mt-1 text-sm text-[#617980]">{{ $program->description }}</p></div><form method="POST" action="{{ route('dashboard.programs.destroy', $program) }}">@csrf @method('DELETE')<button class="text-xs font-bold text-red-600">Eliminar</button></form></div>@empty<p class="text-sm text-[#81969a]">Aún no hay programas.</p>@endforelse</div>
            </article>

            <article class="rounded-3xl border border-[#d8e8e9] bg-white p-6 shadow-sm">
                <h2 class="text-2xl font-extrabold text-[#2e5a63]">Nueva actividad o post</h2>
                <form method="POST" action="{{ route('dashboard.activities.store') }}" class="mt-5 space-y-3">@csrf
                    <input name="title" required placeholder="Título" class="w-full rounded-xl border-[#cfe5e6]">
                    <textarea name="summary" required placeholder="Resumen visible en la tarjeta" rows="2" class="w-full rounded-xl border-[#cfe5e6]"></textarea>
                    <textarea name="content" placeholder="Contenido completo (opcional)" rows="3" class="w-full rounded-xl border-[#cfe5e6]"></textarea>
                    <div class="grid gap-3 sm:grid-cols-2"><input name="published_at" type="date" class="w-full rounded-xl border-[#cfe5e6]"><select name="program_id" class="w-full rounded-xl border-[#cfe5e6]"><option value="">Sin programa</option>@foreach ($programs as $program)<option value="{{ $program->id }}">{{ $program->name }}</option>@endforeach</select></div>
                    <input name="image_url" type="url" placeholder="URL de imagen opcional" class="w-full rounded-xl border-[#cfe5e6]">
                    <label class="flex items-center gap-2 text-sm text-[#617980]"><input type="checkbox" name="is_published" value="1"> Publicar en la web</label>
                    <button class="rounded-full bg-[#2e5a63] px-5 py-2.5 text-sm font-bold text-white">Guardar actividad</button>
                </form>
                <div class="mt-6 space-y-3">@forelse ($activities as $activity)<div class="flex items-start justify-between gap-3 rounded-xl bg-[#fff9ee] p-4"><div><p class="font-bold text-[#2e5a63]">{{ $activity->title }}</p><p class="text-xs text-[#81969a]">{{ $activity->is_published ? 'Publicada' : 'Borrador' }} · {{ $activity->program?->name ?? 'General' }}</p></div><form method="POST" action="{{ route('dashboard.activities.destroy', $activity) }}">@csrf @method('DELETE')<button class="text-xs font-bold text-red-600">Eliminar</button></form></div>@empty<p class="text-sm text-[#81969a]">Aún no hay actividades.</p>@endforelse</div>
            </article>

            <article class="rounded-3xl border border-[#d8e8e9] bg-white p-6 shadow-sm">
                <h2 class="text-2xl font-extrabold text-[#2e5a63]">Personal y equipo</h2>
                <form method="POST" action="{{ route('dashboard.staff.store') }}" class="mt-5 space-y-3">@csrf
                    <div class="grid gap-3 sm:grid-cols-2"><input name="name" required placeholder="Nombre" class="w-full rounded-xl border-[#cfe5e6]"><input name="position" required placeholder="Cargo o rol" class="w-full rounded-xl border-[#cfe5e6]"></div>
                    <textarea name="bio" placeholder="Descripción breve" rows="2" class="w-full rounded-xl border-[#cfe5e6]"></textarea>
                    <input name="photo_url" type="url" placeholder="URL de foto opcional" class="w-full rounded-xl border-[#cfe5e6]">
                    <label class="flex items-center gap-2 text-sm text-[#617980]"><input type="checkbox" name="is_visible" value="1" checked> Mostrar en la web</label>
                    <button class="rounded-full bg-[#2e5a63] px-5 py-2.5 text-sm font-bold text-white">Agregar integrante</button>
                </form>
                <div class="mt-6 space-y-3">@forelse ($staff as $member)<div class="flex items-center justify-between rounded-xl bg-[#f4faf9] p-4"><div><p class="font-bold text-[#2e5a63]">{{ $member->name }}</p><p class="text-sm text-[#617980]">{{ $member->position }}</p></div><form method="POST" action="{{ route('dashboard.staff.destroy', $member) }}">@csrf @method('DELETE')<button class="text-xs font-bold text-red-600">Eliminar</button></form></div>@empty<p class="text-sm text-[#81969a]">Aún no hay integrantes.</p>@endforelse</div>
            </article>

            <article class="rounded-3xl border border-[#d8e8e9] bg-white p-6 shadow-sm">
                <h2 class="text-2xl font-extrabold text-[#2e5a63]">Datos de contacto</h2>
                <form method="POST" action="{{ route('dashboard.settings.update') }}" class="mt-5 space-y-3">@csrf @method('PUT')
                    <input name="foundation_email" type="email" value="{{ $settings['foundation_email'] ?? '' }}" placeholder="Correo" class="w-full rounded-xl border-[#cfe5e6]">
                    <input name="foundation_phone" value="{{ $settings['foundation_phone'] ?? '' }}" placeholder="Teléfono" class="w-full rounded-xl border-[#cfe5e6]">
                    <input name="foundation_address" value="{{ $settings['foundation_address'] ?? '' }}" placeholder="Dirección" class="w-full rounded-xl border-[#cfe5e6]">
                    <textarea name="foundation_description" rows="3" placeholder="Descripción institucional" class="w-full rounded-xl border-[#cfe5e6]">{{ $settings['foundation_description'] ?? '' }}</textarea>
                    <button class="rounded-full bg-[#2e5a63] px-5 py-2.5 text-sm font-bold text-white">Guardar datos</button>
                </form>
            </article>
        </div>
    </div>
</section>
@endsection
