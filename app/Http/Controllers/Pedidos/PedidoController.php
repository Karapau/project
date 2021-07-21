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
        $user_orders = PescadorPedido::where('user_id', auth()->user()->id)->get();
        return view('store.pages.user.pedidos', compact('user_orders'));
    }

    public function pedidoDatalheUser($id)
    {

        $order  = PescadorPedido::with('adresses', 'orders', 'products')->find($id);

        return view('store.pages.user.pedido-produtos', compact('order'));
    }

    public function produtoStatus(Request $request, $id)
    {
        $porto = UserProduct::find($id);
        $porto->status = $request->get('status');
        $porto->save();
        return redirect()->back();
    }
}
