<?php

namespace App\Http\Controllers\Pescador;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\PescadorPedido;
use App\Http\Controllers\Controller;
use App\Models\SellToWallet;
use App\Models\UserProduct;

class PainelPescadorController extends Controller
{
    public function index()
    {
        $produtos = Produto::where('pescador_id', auth()->guard('pescador')->user()->id)->get();
        $pedidos = PescadorPedido::with(['orders', 'adresses', 'products'])->where('pescador_id', auth()->user()->id)->get();
        $wallet = SellToWallet::where('pescador_id', auth()->user()->id)->where('status', 1)->sum('value');
        return view('pescador.pages.index', compact('produtos', 'pedidos', 'wallet'));
    }

    public function pedidos()
    {
        $pedidos = PescadorPedido::with(['orders', 'adresses', 'products'])->where('pescador_id', auth()->user()->id)->get();
        // dd($pedidos[0]->products);
        return view('pescador.pages.pedido.pedidos', compact('pedidos'));
    }

    public function produtoStatus(Request $request, $id)
    {
        $porto = UserProduct::find($id);
        $porto->status = $request->get('status');
        $porto->save();
        return redirect()->back();
    }
}
