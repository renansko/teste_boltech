<?php

use App\Http\Controllers\Api\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/client', [ClientController::class, 'index']); //http://127.0.0.1:8000/client Retornar lista de clientes
Route::get('/client/{id}', [ClientController::class, 'show']); //http://127.0.0.1:8000/client/1 Retornar cliente por id
Route::post('/client', [ClientController::class, 'store']); //http://127.0.0.1:8000//client criar cliente 
Route::patch('/client/{client}', [ClientController::class, 'update']); //http://127.0.0.1:8000//client/1 editar cliente 
Route::delete('/client/{client}', [ClientController::class, 'destroy']); //http://127.0.0.1:8000//client/1 deletar cliente 