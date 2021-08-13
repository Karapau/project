<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produto;
use App\Models\PayImage;
use App\Models\Comprador;
use App\Models\UserOrder;
use App\Models\AdressBuyer;
use App\Models\UserProduct;
use App\Models\SellToWallet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\PescadorPedido;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EncomendasController extends Controller
{
    public function index()
    {

        $orders = UserOrder::with('payimage')->orderBy('created_at', 'desc')->get();
        return view('painel.pages.encomendas.index', compact('orders'));
    }

    public function pedidoDatalheUser($id)
    {
        $arrayGeral = new \stdCLass();
        $arrayGeral->itens = 0;
        $arrayGeral->caixas = 0;
        $user_order = UserOrder::with('enderecos')->find($id);
        $orders  = PescadorPedido::where('order_id', $id)->with('adresses', 'pescador', 'orders', 'products', 'products2')->first();
        $comprador = Comprador::find($user_order->user_id);
        $address = AdressBuyer::find($user_order->adress);
        if ($orders->products2->count() > 0) {
            foreach ($orders->products2 as $products) {
                $arrayGeral->itens += $products->item;
                $arrayGeral->caixas += $products->caixas;
            }
        }
        return view('painel.pages.encomendas.pedido', compact('orders', 'user_order', 'arrayGeral', 'comprador', 'address'));
    }

    public function download($id)
    {
        $comprovante = PayImage::where('order_id', $id)->orderBy('created_at', 'desc')->first();
        $filepath = public_path('storage/comprovantes/' . $comprovante->path);

        return response()->download($filepath);
    }
    public function status(Request $request, $id)
    {
        $porto = UserOrder::find($id);
        $porto->status = $request->get('status');
        if ($request->get('status') == 3) {
            $products = UserProduct::where('order_id', $porto->id)->get();

            foreach ($products as $product) {
                $oldVal = Produto::find($product->product_id);
                $newVal = $oldVal->quantidade_kg + $product->quantity;
                $oldVal->update(['quantidade_kg' => $newVal]);
            }
        }

        $porto->save();


        return redirect()->back();
    }
    public function statusProduto(Request $request)
    {
        $userProduct = UserProduct::find($request->id)->update(['status' => '2']);
        return response()->json($userProduct);
    }

    public function fatura(Request $request, $id)
    {
        $porto = UserOrder::find($id);
        $porto->fatura = $request->get('fatura');
        $porto->save();
        return redirect()->back();
    }
}
