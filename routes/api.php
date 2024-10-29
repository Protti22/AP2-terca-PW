<?php

use App\Http\Controllers\CarroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/carro', [CarroController::class, 'listarTodos']);
Route::get('/carro/{id}', [CarroController::class, 'listarPeloId']);
Route::post('/carro', [CarroController::class, 'criar']);
Route::put('/carro/{id}', [CarroController::class, 'editar']);
Route::delete('/carro/{id}', [CarroController::class, 'remover']);