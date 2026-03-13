<?php

use Illuminate\Support\Facades\Route;
// importar el controlador de productos
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductoController::class, 'index']);

Route::resource('productos', ProductoController::class);

Auth::routes();

// búsqueda en tiempo real
Route::get('buscar-productos', [ProductoController::class, 'search'])
    ->name('productos.buscar');