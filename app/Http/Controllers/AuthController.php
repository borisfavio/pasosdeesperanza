<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'Las credenciales no son válidas.'])->onlyInput('email');
        }

        if (! $request->user()->isAdmin()) {
            Auth::logout();

            return back()->withErrors(['email' => 'Tu cuenta no tiene acceso al panel administrativo.'])->onlyInput('email');
        }

        $request->session()->regenerate();

        return to_route('dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login');
    }
}
