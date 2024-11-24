<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VentaController;
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
    return view('landing');
});

Route::resource('proveedor', ProveedorController::class)->middleware('auth');;

Route::resource('cliente', ClienteController::class)->middleware('auth');

Route::resource('producto', ProductoController::class);

Route::resource('compra', ProductoController::class);

Route::resource('venta', ProductoController::class);

Route::post('/compras/store', [CompraController::class, 'store'])->name('compras.store');
Route::post('/compras/store-bulk', [CompraController::class, 'storeBulk'])->name('compras.store.bulk');
Route::post('/ventas/store', [VentaController::class, 'store'])->name('ventas.store');
Route::post('/ventas/store-bulk', [VentaController::class, 'storeBulk'])->name('ventas.store.bulk');

Route::get('/misCompras', [VentaController::class, 'index'])->name('ventas.index');
Route::get('/misVentas', [CompraController::class, 'index'])->name('compras.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Redirigir a la vista landing al entrar
    Route::get('/dashboard', function () {
        return view('seleccion-user');
    })->name('seleccion-user');

    // Nueva ruta para acceder a la vista dashboard
    Route::get('/config', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/cliente-login', function (){
    return view('cliente-login');
});
Route::get('/proveedor-login', function (){
    return view('proveedor-login');
});
Route::get('/landing', function (){
    return view('landing');
});