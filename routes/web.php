<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'routes' => [
            'home' => Route::has('home') ? route('home') : null,
        ],
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
/*
Route::get('/guardar_producto', [ProductsController::class, 'create'])->name('product.crear');

Route::get('/catalogo', function () {
    $productos = App\Models\Product::all(); // Obtener todos los productos, asegúrate de importar el modelo adecuado

    return Inertia::render('Catalogo', [
        'productos' => $productos, // Pasar los productos a la vista
    ]);
})->name('catalogo');

Route::get('/cotizaciones', function () {
    return Inertia::render('Cotizaciones');
})->name('cotizaciones');
 */


/* Materiales */
Route::resource('admin/materiales', MaterialController::class);

/* Productos */
Route::resource('admin/productos', ProductsController::class);
