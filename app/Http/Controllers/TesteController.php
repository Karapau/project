<?php

namespace App\Http\Controllers;

use App\Models\Comprador;
use App\Models\UserOrder;
use Apoca\Sibs\Facade\Sibs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PescadorPedido;
use Illuminate\Support\Facades\Http;

class TesteController extends Controller
{
    public function index(Request $request)
    {
        $get = PescadorPedido::with('adresses', 'orders', 'products', 'users', 'pescador')->get();
        dd($get);
    }


}
