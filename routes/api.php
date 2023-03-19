<?php

use Illuminate\Support\Facades\Route;

// Rotas do desenvolvedor
Route::controller(App\Http\Controllers\DesenvolvedorController::class)->group(function () {
    Route::prefix('desenvolvedor')->group(function () {
        Route::post('cadastrar', 'cadastrar');
        Route::put('editar', 'editar');
        Route::delete('excluir', 'excluir');
        Route::get('resgatar', 'resgatar');
        Route::get('listar', 'listar');
    });
});

// Rotas do(s) telefone(s) do desenvolvedor
Route::controller(App\Http\Controllers\TelefoneController::class)->group(function () {
    Route::prefix('telefone')->group(function () {
        Route::post('cadastrar', 'cadastrar');
        Route::put('editar', 'editar');
        Route::delete('excluir', 'excluir');
        Route::get('resgatar', 'resgatar');
        Route::get('listar', 'listar');
    });
});

