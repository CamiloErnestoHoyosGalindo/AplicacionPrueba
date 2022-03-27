<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'perform'])->name('logout.perform');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function () {
 
 });

Route::get('/reset', [App\Http\Controllers\HomeController::class, 'reset'])->name('cargarData');

//Rutas CRUD ciudades

Route::get('/cityAdmin', [App\Http\Controllers\HomeController::class, 'adminInicio'])->name('adminCity');

Route::post('/cityAdmin', [App\Http\Controllers\HomeController::class,'crearCiudad'])->name('adminCity.agregar');

Route::get('/editarCiudad/{cod}', [App\Http\Controllers\HomeController::class, 'editarCiudad'])->name('adminCity.editar');

Route::put('/editarCiudad/{cod}', [App\Http\Controllers\HomeController::class, 'actualizarCiudad'])->name('adminCity.actualizar');

Route::delete('eliminarCiudad/{cod}', [App\Http\Controllers\HomeController::class, 'eliminarCiudad'])->name('adminCity.eliminar');

//Rutas CRUD clientes

Route::get('/clientAdmin', [App\Http\Controllers\HomeController::class, 'adminCliente'])->name('adminClient');

Route::post('/clientAdmin', [App\Http\Controllers\HomeController::class,'crearCliente'])->name('adminClient.agregar');

Route::get('/editarCliente/{cod}', [App\Http\Controllers\HomeController::class, 'editarCliente'])->name('adminClient.editar');

Route::put('/editarCliente/{cod}', [App\Http\Controllers\HomeController::class, 'actualizarCliente'])->name('adminClient.actualizar');

Route::delete('eliminarCliente/{cod}', [App\Http\Controllers\HomeController::class, 'eliminarCliente'])->name('adminClient.eliminar');
