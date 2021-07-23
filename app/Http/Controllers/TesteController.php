<?php

namespace App\Http\Controllers;

use App\Models\Comprador;
use App\Models\UserOrder;
use App\Models\WalletCom;
use Apoca\Sibs\Facade\Sibs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PescadorPedido;
use Illuminate\Support\Facades\Http;

class TesteController extends Controller
{
    public function index(Request $request)
    {
        $id = auth()->user()->id;
        $get = WalletCom::where('user_id', auth()->user()->id)->with('orders')->get();
        dd($get);
    }


}
