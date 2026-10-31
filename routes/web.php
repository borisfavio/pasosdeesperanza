<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonacionController;
use App\Http\Controllers\HomeController;
use App\Models\Activity;
use Illuminate\Support\Facades\Route;

// Definición de Rutas asignándoles un nombre único ->name(...)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nosotros', [HomeController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto');
Route::post('/contacto', [HomeController::class, 'enviarContacto'])->name('contacto.enviar');
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');
Route::get('/computacion-a-mi-alcance', [HomeController::class, 'computacion'])->name('computacion.index');
Route::get('/donar', [DonacionController::class, 'index'])->name('donaciones');
Route::post('/donar', [DonacionController::class, 'store'])->name('donaciones.store');
Route::get('/actividades', function () {
    return view('actividades.index', ['activities' => Activity::with('program')->where('is_published', true)->latest('published_at')->latest()->get()]);
})->name('actividades.index');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'create'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'store'])->name('login.store');
});
Route::post('/admin/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/programas', [DashboardController::class, 'storeProgram'])->name('dashboard.programs.store');
    Route::delete('/programas/{program}', [DashboardController::class, 'destroyProgram'])->name('dashboard.programs.destroy');
    Route::post('/actividades', [DashboardController::class, 'storeActivity'])->name('dashboard.activities.store');
    Route::delete('/actividades/{activity}', [DashboardController::class, 'destroyActivity'])->name('dashboard.activities.destroy');
    Route::post('/personal', [DashboardController::class, 'storeStaff'])->name('dashboard.staff.store');
    Route::delete('/personal/{staff}', [DashboardController::class, 'destroyStaff'])->name('dashboard.staff.destroy');
    Route::put('/configuracion', [DashboardController::class, 'updateSettings'])->name('dashboard.settings.update');
});
