<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        var_dump(request()->all());

        return ' lista de pedidos';
    }
}
