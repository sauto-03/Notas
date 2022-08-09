<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Crud\Tema;
use App\Http\Controllers\Crud\Carpeta;
use App\Http\Controllers\Crud\Nota;
use App\Http\Controllers\Crud\Ejemplo;
use App\Models\Carpetas;
use App\Models\Ejemplos;
use App\Models\Notas;
use App\Models\Temas;

Route::get('/', function () {
    return view('index');
})->name('index');


//!rutas de los formularios
Route::get('form-tema', function () {
    return view('form.temas-form', ['opcion1' => 'editar']);
})->name('form-tema');


Route::get('form-carpeta', function () {

    $temas = Temas::all();
    return view('form.carpeta-form', ['opcion1' => 'editar', 'temas' => $temas]);
})->name('form-carpeta');

Route::get('form-notas', function () {
    $carpetas = Carpetas::all();

    return view('form.notas-form', ['opcion1' => 'crear', 'carpetas' => $carpetas]);
})->name('form-nota');

Route::get('form-ejemplo', function () {
    $notas = Notas::all();
    return view('form.ejemplo-form', ['opcion1' => 'crear', 'notas' => $notas,]);
})->name('form-ejemplo');


Route::get('ejemplo', function () {
    $notas = Ejemplos::all();
    return view('ejemplos', ['ejemplos' => $notas,]);
})->name('ejemplo');



//!ruta del crud
Route::controller(Tema::class)->group(function () {
    Route::get('temas', 'index')->name('temas');
    Route::post('tema/crear', 'store')->name('temas-crear');
    Route::get('tema/ver/{id}', 'show')->name('temas-ver');
    Route::put('tema/editar/{id}', 'update')->name('temas-editar');
    Route::get('tema/eliminar/{id}', 'destroy')->name('temas-eliminar');
    Route::get('tema/edit/{id}', 'edit')->name('tema-edit');
});


Route::controller(Carpeta::class)->group(function () {
    Route::get('carpeta', 'index')->name('carpetas');
    Route::post('carpeta/crear', 'store')->name('carpetas-crear');
    Route::get('carpeta/ver/{id}', 'show')->name('carpetas-ver');
    Route::put('carpeta/editar/{id}', 'update')->name('carpetas-editar');
    Route::get('carpeta/eliminar/{id}', 'destroy')->name('carpetas-eliminar');
    Route::get('carpeta/edit/{id}', 'edit')->name('carpeta-edit');
});

Route::controller(Nota::class)->group(function () {
    Route::get('nota', 'index')->name('notas');
    Route::post('nota/crear/', 'store')->name('notas-crear');
    Route::get('nota/ver/{id}', 'show')->name('notas-ver');
    Route::put('nota/editar/{id}', 'update')->name('notas-editar');
    Route::get('nota/eliminar/{id}', 'destroy')->name('notas-eliminar');
    Route::get('nota/edit/{id}', 'edit')->name('notas-edit');
});

Route::controller(Ejemplo::class)->group(function () {
    Route::post('ejemplo/crear/', 'store')->name('ejemplos-crear');
    Route::put('ejemplo/editar/{id}', 'update')->name('ejemplos-editar');
    Route::get('ejemplo/eliminar/{id}', 'destroy')->name('ejemplos-eliminar');
    Route::get('ejemplo/edit/{id}', 'edit')->name('ejemplos-edit');
});
