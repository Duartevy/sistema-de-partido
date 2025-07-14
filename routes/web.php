<?php

use App\Http\Controllers\Web\PartidoWebController;
use App\Http\Controllers\Web\VereadorWebController;

// Página inicial com lista de partidos
Route::get('/', [PartidoWebController::class, 'index'])->name('home'); // <- nomeando como 'home'
Route::get('/partidos', [PartidoWebController::class, 'index'])->name('partidos.index');

// Rotas de partidos (formulários e ações visuais)
Route::resource('partidos', PartidoWebController::class)->except(['index']);

// Rotas de vereadores (formulários e ações visuais)
Route::resource('vereadores', VereadorWebController::class);
