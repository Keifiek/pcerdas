<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;

use App\Http\Controllers\ClienteController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/provedors', [ProveedorController::class, 'index']);
Route::get('/registro-proveedors', [ProveedorController::class, 'create']);
Route::post('/guardar-proveedors', [ProveedorController::class, 'store']);
Route::resource('proveedor', ProveedorController::class)->middleware('auth');;

Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/registro-clientes', [ClienteController::class, 'create']);
Route::post('/guardar-clientes', [ClienteController::class, 'store']);
Route::resource('cliente', ClienteController::class)->middleware('auth');;

Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/registro-productos', [ProductoController::class, 'create']);
Route::post('/guardar-productos', [ProductoController::class, 'store']);
Route::resource('producto', ProductoController::class)->middleware('auth');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
