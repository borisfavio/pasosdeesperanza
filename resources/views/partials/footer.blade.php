<footer class="border-t border-[#d8e8e9] bg-[#234f57] pt-16 pb-8 text-[#eaf4f4]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
        <!-- Columna 1: Info Fundación -->
        <div class="space-y-4">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo de Pasos de Esperanza" class="h-12 w-12 rounded-full bg-white p-0.5 shadow-sm">
                <h3 class="text-lg font-bold text-white">Fundación Pasos de Esperanza</h3>
            </div>
            <p class="text-sm leading-relaxed text-[#d6e7e7]">
                Transformando realidades a través del apoyo pedagógico, acompañamiento familiar y proyectos comunitarios sostenibles.
            </p>
        </div>

        <!-- Columna 2: Enlaces Rápidos -->
        <div>
            <h4 class="mb-4 text-sm font-semibold uppercase tracking-wider text-white">Navegación</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('home') }}" class="transition hover:text-[#f1d36e]">Inicio</a></li>
                <li><a href="#pilares" class="transition hover:text-[#f1d36e]">Programas Educativos</a></li>
                <li><a href="#impacto" class="transition hover:text-[#f1d36e]">Nuestro Impacto</a></li>
                <li><a href="{{ route('contacto') }}" class="transition hover:text-[#f1d36e]">Formulario de Contacto</a></li>
            </ul>
        </div>

        <!-- Columna 3: Programas -->
        <div>
            <h4 class="mb-4 text-sm font-semibold uppercase tracking-wider text-white">Áreas de Trabajo</h4>
            <ul class="space-y-2 text-sm text-[#d6e7e7]">
                <li>Clases de Refuerzo Escolar</li>
                <li>Gestión y Apoyo Logístico</li>
                <li>Desarrollo Integral Familiar</li>
                <li>Voluntariado y Alianzas</li>
            </ul>
        </div>

        <!-- Columna 4: Contacto directo -->
        <div>
            <h4 class="mb-4 text-sm font-semibold uppercase tracking-wider text-white">Ubicación y Contacto</h4>
            <p class="mb-2 text-sm text-[#d6e7e7]">📍 Zona Alto Santiago de Alcaya, Calle 4 Nro 467</p>
            <p class="mb-2 text-sm text-[#d6e7e7]">📍 La Paz, Bolivia</p>
            <p class="mb-2 text-sm text-[#d6e7e7]">✉️ contacto@fundacionpasosdeesperanza.org.bo</p>
            <p class="mb-2 text-sm text-[#d6e7e7]">📞 69700259</p>
            <a href="{{ route('contacto') }}" class="mt-3 inline-block text-sm font-semibold text-[#f1d36e] hover:underline">
                Escribir un mensaje &rarr;
            </a>
        </div>
    </div>

    <!-- Sub-footer -->
    <div class="max-w-7xl mx-auto border-t border-white/10 px-4 pt-8 text-center text-xs text-[#a9c7cb] sm:px-6 lg:px-8">
        <p>&copy; {{ date('Y') }} Fundación Pasos de Esperanza. Desarrollado GyC Consultora.</p>
    </div>
</footer>
