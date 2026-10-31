<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        $heroImages = [
            asset('images/hero1.jpg'),
            asset('images/hero2.jpg'),
            asset('images/hero3.jpg'),
        ];

        $hasContentTables = Schema::hasTable('programs') && Schema::hasTable('activities');
        $programs = $hasContentTables ? Program::where('is_active', true)->latest()->get() : collect();
        $activities = $hasContentTables ? Activity::where('is_published', true)->latest('published_at')->take(3)->get() : collect();
        $stats = [
            ['label' => 'Programas activos', 'value' => (string) $programs->count(), 'suffix' => ''],
            ['label' => 'Actividades publicadas', 'value' => (string) $activities->count(), 'suffix' => ''],
            ['label' => 'Años construyendo comunidad', 'value' => '10', 'suffix' => '+'],
        ];

        return view('landing', compact('heroImages', 'stats', 'programs', 'activities'));
    }

    public function nosotros()
    {
        return view('nosotros');
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function computacion()
    {
        return view('computacion.index');
    }

    public function donar()
    {
        return view('donar');
    }

    public function enviarContacto(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'telefono' => ['nullable', 'string', 'max:30'],
            'motivo' => ['required', 'in:voluntariado,alianza,dona,consulta'],
            'mensaje' => ['required', 'string', 'min:15', 'max:2000'],
        ]);

        // El canal de correo actual registra los mensajes de forma segura.
        // Al configurar SMTP, este punto puede conectarse a una notificación por correo.
        logger()->info('Nuevo mensaje desde el formulario de contacto', $datos);

        return to_route('contacto')->with('success', '¡Gracias por escribirnos! Recibimos tu mensaje y te responderemos pronto.');
    }

    public function sitemap()
    {
        return response()
            ->view('sitemap', ['pages' => [route('home'), route('contacto')]])
            ->header('Content-Type', 'application/xml');
    }
}
