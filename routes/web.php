<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonacionController;

// Definición de Rutas asignándoles un nombre único ->name(...)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nosotros', [HomeController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto');
Route::post('/contacto', [HomeController::class, 'enviarContacto'])->name('contacto.enviar');
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');
Route::get('/computacion-a-mi-alcance', [HomeController::class, 'computacion'])->name('computacion.index');
Route::get('/donar', [DonacionController::class, 'index'])->name('donaciones');
Route::post('/donar', [DonacionController::class, 'store'])->name('donaciones.store');
