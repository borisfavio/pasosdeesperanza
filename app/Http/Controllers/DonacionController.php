<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class DonacionController extends Controller
{
    public function index()
    {
        return view('donaciones');
    }

    public function store(Request $request)
    {
        // Campo trampa: si un bot lo llena, no hacemos nada.
        if ($request->filled('sitio_web')) {
            return redirect()->route('donaciones');
        }

        $data = $request->validate([
            'region'      => ['required', 'in:bo,ext'],
            'moneda'      => ['required', 'in:Bs,USD'],
            'monto'       => ['required', 'numeric', 'min:1', 'max:1000000'],
            'programas'   => ['nullable', 'array'],
            'programas.*' => ['string', 'max:60'],
            'metodo'      => ['required', 'string', 'max:80'],
            'referencia'  => ['required', 'string', 'max:20'],
            'nombre'      => ['required', 'string', 'max:120'],
            'email'       => ['required', 'email', 'max:150'],
            'pais'        => ['nullable', 'string', 'max:80'],
            'mensaje'     => ['nullable', 'string', 'max:1000'],
            'operacion'   => ['nullable', 'string', 'max:80', 'required_without:comprobante'],
            'comprobante' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120', 'required_without:operacion'],
        ], [
            'operacion.required_without'   => 'Sube tu comprobante o escribe el número de operación.',
            'comprobante.required_without' => 'Sube tu comprobante o escribe el número de operación.',
            'comprobante.max'              => 'El comprobante no debe superar los 5 MB.',
        ]);

        // El comprobante se guarda en el disco privado (no se puede abrir desde internet).
        $ruta = $request->hasFile('comprobante')
            ? $request->file('comprobante')->store('comprobantes', 'local')
            : null;

        $programas = ! empty($data['programas']) ? implode(', ', $data['programas']) : 'Donde más se necesite';

        $cuerpo = implode("\n", [
            "Nueva donación registrada",
            "Referencia: {$data['referencia']}",
            "Monto: {$data['moneda']} {$data['monto']}",
            "Desde: " . ($data['region'] === 'bo' ? 'Bolivia' : 'Exterior'),
            "Forma de pago: {$data['metodo']}",
            "Programas: {$programas}",
            "N.º de operación: " . ($data['operacion'] ?? '-'),
            "",
            "Donante: {$data['nombre']}",
            "Correo: {$data['email']}",
            "País: " . ($data['pais'] ?? '-'),
            "Mensaje: " . ($data['mensaje'] ?? '-'),
        ]);

        try {
            Mail::raw($cuerpo, function ($mail) use ($data, $ruta) {
                $mail->to(config('mail.from.address')) // cambia por el correo donde quieres recibir los avisos
                    ->replyTo($data['email'], $data['nombre'])
                    ->subject("Nueva donación {$data['referencia']}");

                if ($ruta) {
                    $mail->attach(Storage::disk('local')->path($ruta));
                }
            });
        } catch (\Throwable $e) {
            // Si el correo falla, la donación igual queda registrada en el log y el comprobante en storage.
            Log::error('No se pudo enviar el aviso de donación', [
                'referencia' => $data['referencia'],
                'error'      => $e->getMessage(),
            ]);
        }

        Log::info('Donación registrada', [
            'referencia'  => $data['referencia'],
            'monto'       => $data['monto'],
            'moneda'      => $data['moneda'],
            'comprobante' => $ruta,
        ]);

        return redirect()->route('donaciones')->with('donacion_ok', $data['referencia']);
    }
}
