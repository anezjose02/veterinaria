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
Route::resource('citas', 'App\Http\Controllers\CitasController');
Route::resource('reservas', 'App\Http\Controllers\ReservasController');
Route::resource('citas_creadas', 'App\Http\Controllers\CitasCreadasController');
Route::resource('cliente', 'App\Http\Controllers\ClientesController');
Route::resource('mascota', 'App\Http\Controllers\MascotasController');

Route::post('deleteCita', 'App\Http\Controllers\CitasController@destroy');
Route::post('editarCita', 'App\Http\Controllers\CitasController@update');
Route::post('guardarCita', 'App\Http\Controllers\CitasController@guardar');
Route::post('guardarCliente', 'App\Http\Controllers\ClientesController@store');
Route::post('deleteCliente', 'App\Http\Controllers\ClientesController@destroy');
