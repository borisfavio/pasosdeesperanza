@extends('layouts.app')

@section('title', 'Actividades y noticias | Fundación Pasos de Esperanza')
@section('content')
<section class="bg-[linear-gradient(135deg,#fbfcfa_0%,#eef7f7_100%)] py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#8aa64e]">Nuestra comunidad</p>
        <h1 class="mt-3 text-4xl font-extrabold text-[#2e5a63] sm:text-5xl">Actividades y noticias</h1>
        <p class="mt-4 max-w-2xl text-lg leading-relaxed text-[#617980]">Conoce lo que estamos construyendo junto a niños, familias, voluntariado y aliados.</p>
        <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($activities as $activity)
                <article class="overflow-hidden rounded-3xl border border-[#d8e8e9] bg-white shadow-sm">
                    @if ($activity->image_url)<img src="{{ $activity->image_url }}" alt="" class="h-48 w-full object-cover" loading="lazy">@else<div class="flex h-32 items-center justify-center bg-[#dff0ef] text-4xl">🌱</div>@endif
                    <div class="p-6"><p class="text-xs font-bold uppercase tracking-wider text-[#8aa64e]">{{ $activity->program?->name ?? 'Fundación' }}</p><h2 class="mt-2 text-xl font-extrabold text-[#2e5a63]">{{ $activity->title }}</h2><p class="mt-3 text-sm leading-relaxed text-[#617980]">{{ $activity->summary }}</p>@if($activity->published_at)<time class="mt-5 block text-xs text-[#81969a]" datetime="{{ $activity->published_at->toDateString() }}">{{ $activity->published_at->translatedFormat('d \d\e F \d\e Y') }}</time>@endif</div>
                </article>
            @empty
                <div class="rounded-3xl border border-dashed border-[#cfe5e6] bg-white p-10 text-[#617980] md:col-span-2 lg:col-span-3">Pronto compartiremos nuevas actividades. Vuelve a visitarnos.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection
