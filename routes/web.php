<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/registro-productos', [ProductoController::class, 'create']);
Route::post('/guardar-productos', [ProductoController::class, 'store']);
Route::resource('producto', ProductoController::class);