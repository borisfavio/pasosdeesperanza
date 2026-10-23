<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fundación Pasos de Esperanza')</title>
    <meta name="description" content="@yield('meta_description', 'Fundación Pasos de Esperanza acompaña a niños y familias en La Paz, Bolivia, mediante educación, comunidad y oportunidades reales.')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:locale" content="es_BO">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Fundación Pasos de Esperanza">
    <meta property="og:title" content="@yield('title', 'Fundación Pasos de Esperanza')">
    <meta property="og:description" content="@yield('meta_description', 'Fundación Pasos de Esperanza acompaña a niños y familias en La Paz, Bolivia, mediante educación, comunidad y oportunidades reales.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title', 'Fundación Pasos de Esperanza')">
    <meta name="twitter:description" content="@yield('meta_description', 'Fundación Pasos de Esperanza acompaña a niños y familias en La Paz, Bolivia, mediante educación, comunidad y oportunidades reales.')">
    <!-- CDN de Tailwind CSS con tipografía limpia -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'NGO',
            'name' => 'Fundación Pasos de Esperanza',
            'url' => url('/'),
            'logo' => asset('images/logo.png'),
            'description' => 'Fundación que acompaña a niños y familias mediante educación, organización comunitaria y espacios seguros.',
            'email' => 'contacto@fundacionpasosdeesperanza.org.bo',
            'telephone' => '+59169700259',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Zona Alto Santiago de Alcaya, Calle 4 Nro 467',
                'addressLocality' => 'La Paz',
                'addressCountry' => 'BO',
            ],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
</head>
<body class="bg-[#fbfcfa] text-[#2e5a63] flex flex-col min-h-screen antialiased">

    <!-- Navegación Modular -->
    @include('partials.navbar')

    <!-- Contenido Principal Dinámico -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Pie de Página Modular -->
    @include('partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navbar = document.querySelector('[data-navbar]');
            const menuToggle = document.querySelector('[data-menu-toggle]');
            const mobileMenu = document.querySelector('[data-mobile-menu]');

            const setNavbarState = () => {
                if (!navbar) return;

                const scrolled = window.scrollY > 18;
                navbar.classList.toggle('bg-white/75', scrolled);
                navbar.classList.toggle('bg-white/95', !scrolled);
                navbar.classList.toggle('border-slate-200/50', scrolled);
                navbar.classList.toggle('border-slate-200/70', !scrolled);
                navbar.classList.toggle('shadow-md', scrolled);
                navbar.classList.toggle('shadow-sm', !scrolled);
            };

            if (menuToggle && mobileMenu) {
                menuToggle.addEventListener('click', function () {
                    const isOpen = !mobileMenu.classList.toggle('hidden');
                    this.setAttribute('aria-expanded', isOpen);
                });
            }

            setNavbarState();
            window.addEventListener('scroll', setNavbarState, { passive: true });
        });
    </script>
    @stack('scripts')
</body>
</html>
