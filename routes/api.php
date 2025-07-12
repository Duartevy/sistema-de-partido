<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\VereadorController;

Route::apiResource('partidos', PartidoController::class);
Route::apiResource('vereadores', VereadorController::class);
