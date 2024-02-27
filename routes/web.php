<?php

use App\Http\Controllers\PedidoController;
use App\Http\Middleware\VerificaTokenMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pedidos', [PedidoController::class, 'index']);