<?php

use App\Http\Controllers\ModeloController;
use App\Http\Controllers\principalController;
use App\Http\Controllers\RevisionController;
use App\Http\Controllers\RevisionesController;
use App\Http\Controllers\VehiculoController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

// CREA LAS RUTAS

// mostramos vistas vehiculos
Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');
Route::get('/registrar/vehiculo', [VehiculoController::class, 'create'])->name('vehiculos.create');
Route::post('/registrar/vehiculo', [VehiculoController::class, 'store'])->name('vehiculos.store');
Route::get('/registrar/vehiculo/{id}', [VehiculoController::class, 'show'])->name('vehiculos.show');
Route::get('/buscarVehiculo', [VehiculoController::class, 'buscarVehiculo'])->name('vehiculos.buscar');

// mostramos vistas revisiones
Route::get('/revision/{id}', [RevisionesController::class, 'index'])->name('revisiones.historial');
Route::get('/revision/crear/{id}', [RevisionesController::class, 'create'])->name('revisiones.create');
Route::post('/revision/crear/{id}', [RevisionesController::class, 'store'])->name('revisiones.store');  

