<?php

use App\Http\Controllers\Web\PartidoWebController;
use App\Http\Controllers\Web\VereadorWebController;

// Página inicial com lista de partidos
Route::get('/', [VereadorWebController::class, 'index'])->name('home'); // 
Route::get('/vereadores', [VereadorWebController::class, 'index'])->name('vereador.index');

// Rotas de partidos (formulários e ações visuais)
Route::resource('partidos', PartidoWebController::class)->except(['index']);

// Rotas de vereadores (formulários e ações visuais)
Route::resource('vereadores', VereadorWebController::class);
