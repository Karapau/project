<?php

namespace App\Http\Controllers\Pedidos;

use App\Http\Controllers\Controller;
use App\Models\PescadorPedido;
use App\Models\UserOrder;
use App\Models\UserProduct;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function userPedido()
    {
        $user_orders = UserOrder::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('app-front.store.pages.encomenda', compact('user_orders'));
    }

    public function pedidoDatalheUser($id)
    {

        $user_order = UserOrder::with('enderecos')->find($id);
        $orders  = PescadorPedido::where('order_id', $id)->with('adresses', 'pescador', 'orders', 'products')->get();
        return view('app-front.store.pages.pedido-list', compact('orders', 'user_order'));
    }

    public function produtoStatus(Request $request, $id)
    {
        $porto = UserProduct::find($id);
        $porto->status = $request->get('status');
        $porto->save();
        return redirect()->back();
    }
}
