<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\VeterinarioController;


Route::post('registrarCliente', [LoginController::class, 'registrarCliente']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
