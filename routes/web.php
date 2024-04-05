<?php

use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/dashboard', [CotizacionController::class, 'cotizador'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Materiales */
    Route::resource('admin/materiales', MaterialController::class);

    /* Productos */
    Route::resource('admin/productos', ProductsController::class);

    /* Cotizaciones */
    Route::get('/cotizaciones', [CotizacionController::class, 'index'])->name('cotizaciones');
    Route::get('/mis-cotizaciones', [CotizacionController::class, 'misCotizaciones'])->name('cotizaciones.user');
    Route::post('/cotizaciones', [CotizacionController::class, 'store'])->name('cotizaciones.store');
    Route::delete('/cotizaciones/{cotizacion}', [CotizacionController::class, 'destroy'])->name('cotizaciones.destroy');

    /* USUARIOS Excel Exportaciones*/
    Route::get('/users/export', [ExportController::class, 'users'])->name('users.export');

    /* Cotizaciones PDF Impresión*/
    Route::get('/cotizacion/pdf/{cotizacion}', [ExportController::class, 'DescargarPDF'])->name('cotizacion.pdf');

});

require __DIR__.'/auth.php';

