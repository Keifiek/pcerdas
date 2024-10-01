<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;

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
Route::resource('proveedor', ProveedorController::class);