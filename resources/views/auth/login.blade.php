@extends('layouts.app')

@section('title', 'Acceso administrativo | Pasos de Esperanza')

@section('content')
<section class="flex min-h-[70vh] items-center justify-center bg-[#eef7f7] px-4 py-16">
    <div class="w-full max-w-md rounded-3xl border border-[#d8e8e9] bg-white p-8 shadow-xl">
        <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#8aa64e]">Administración</p>
        <h1 class="mt-2 text-3xl font-extrabold text-[#2e5a63]">Ingresar al dashboard</h1>
        <p class="mt-3 text-sm text-[#617980]">Gestiona el contenido que ve nuestra comunidad.</p>
        @if ($errors->any())
            <div class="mt-5 rounded-xl bg-red-50 p-4 text-sm text-red-700">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('login.store') }}" class="mt-7 space-y-5">
            @csrf
            <label class="block text-sm font-bold text-[#2e5a63]">Correo
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-2 w-full rounded-xl border-[#cfe5e6] px-4 py-3">
            </label>
            <label class="block text-sm font-bold text-[#2e5a63]">Contraseña
                <input type="password" name="password" required class="mt-2 w-full rounded-xl border-[#cfe5e6] px-4 py-3">
            </label>
            <label class="flex items-center gap-2 text-sm text-[#617980]"><input type="checkbox" name="remember" value="1"> Recordarme</label>
            <button class="w-full rounded-full bg-[#2e5a63] px-5 py-3 font-extrabold text-white hover:bg-[#3f7079]">Ingresar</button>
        </form>
    </div>
</section>
@endsection
