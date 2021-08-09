<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comprador;
use App\Models\AdressBuyer;
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
        $orders  = PescadorPedido::with('adresses', 'pescador', 'orders', 'products')->get();
        $userOrders = UserOrder::all();
        $userProducts = UserProduct::with('orders')->get();
        // dd($userProducts);
        return view('painel.pages.entregadores.index', compact('orders', 'userOrders', 'userProducts'));
    }

    public function indexdados($id)
    {
        $userProduct = UserProduct::with('orders','pescador')->find($id);
        $comprador = Comprador::find($userProduct->orders->user_id);
        $address = AdressBuyer::find($userProduct->orders->adress);
        return view('painel.pages.entregadores.indexDados', compact('userProduct', 'comprador', 'address'));
    }
}
