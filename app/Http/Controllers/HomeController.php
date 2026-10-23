<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
public function index()
{
    $heroImages = [
        asset('images/hero1.jpg'),
        asset('images/hero2.jpg'),
        asset('images/hero3.jpg'),
    ];

    $stats = [
        ['label' => 'Niños acompañados', 'value' => '631', 'suffix' => '+'],
        ['label' => 'Familias beneficiadas', 'value' => '500', 'suffix' => ''],
        ['label' => 'Talleres educativos', 'value' => '15', 'suffix' => ''],
    ];

    return view('landing', compact('heroImages', 'stats'));
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
