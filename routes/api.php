<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Crud\Tema;
use App\Http\Controllers\Crud\Carpeta;
use App\Http\Controllers\Crud\Nota;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(Tema::class)->group(function () {
    Route::get('temas', 'index')->name('temas');
    Route::post('tema/crear', 'store')->name('temas-crear');
    Route::get('tema/ver/{id}', 'show')->name('temas-ver');
    Route::put('tema/editar/{id}', 'update')->name('temas-editar');
    Route::delete('tema/eliminar/{id}', 'destroy')->name('temas-eliminar');
});


Route::controller(Carpeta::class)->group(function () {
    Route::get('carpeta', 'index')->name('carpetas');
    Route::post('carpeta/crear', 'store')->name('carpetas-crear');
    Route::get('carpeta/ver/{id}', 'show')->name('carpetas-ver');
    Route::put('carpeta/editar/{id}', 'update')->name('carpetas-editar');
    Route::delete('carpeta/eliminar/{id}', 'destroy')->name('carpetas-eliminar');
});

Route::controller(Notas::class)->group(function () {
    Route::get('nota', 'index')->name('notas');
    Route::post('nota/crear/{id_serie}', 'store')->name('notas-crear');
    Route::get('nota/ver/{id}', 'show')->name('notas-ver');
    Route::put('nota/editar/{id}', 'update')->name('notas-editar');
    Route::delete('nota/eliminar/{id}', 'destroy')->name('notas-eliminar');
});
