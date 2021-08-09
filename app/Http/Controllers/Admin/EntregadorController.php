<?php

namespace App\Http\Controllers\Admin;

use App\Models\PayImage;
use App\Models\UserOrder;
use App\Models\UserProduct;
use App\Models\SellToWallet;
use App\Models\PescadorPedido;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EntregadorController extends Controller
{
    public function index()
    {
        $orders = UserOrder::get();
        dd($orders);
        return view('painel.pages.entregadores.index');
    }
}
