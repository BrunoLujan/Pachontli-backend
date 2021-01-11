<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\VeterinarioController;


Route::post('registrarCliente', [LoginController::class, 'registrarCliente']);
Route::post('login', [LoginController::class, 'authenticate']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('logout', [LoginController::class, 'logout']);

    //Cliente
    Route::get('getCliente', [ClienteController::class, 'getCliente']);

    //CRUD Mascota
    Route::post('registrarMascota', [MascotaController::class, 'registrarMascota']);
    Route::put('{mascota}/editarMascota', [MascotaController::class, 'editarMascota']);
    Route::delete('{mascota}/eliminarMascota', [MascotaController::class, 'eliminarMascota']);
    Route::get('getMascotas', [MascotaController::class, 'getMascotas']);
});

