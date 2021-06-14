<?php

namespace App\Http\Controllers\Checkout;

use App\Models\AdressBuyer;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PescadorPedido;
use App\Models\Produto;
use App\Models\SellToWallet;
use App\Models\UserOrder;
use App\Models\UserProduct;

class CheckoutController extends Controller
{
    public function adress()
    {
        $adresses = AdressBuyer::where('user_id', auth()->user()->id)->get();
        return view('store.pages.painel.endereco', compact('adresses'));
    }
    public function index()
    {
        $adresses = AdressBuyer::where('user_id', auth()->user()->id)->get();
        return view('store.pages.painel.checkout', compact('adresses'));
    }

    public function payment(Request $request)
    {
        $messages = [
            // 'adress.required' => 'Cadastre um endereço ou escolha um cadastrado',
            'payment.required' => 'Escolha um Metodo de pagamento para continuar',
            'shipment.required' => 'Escolha um Metodo de Entrega para continuar',
        ];
        $validated = $request->validate([
            // 'adress' => 'required',
            'payment' => 'required',
            'shipment' => 'required',
        ], $messages);

        $user_order = UserOrder::create([
            'adress' => $request->adress,
            'payment_mothod' => $request->payment,
            'shipping_mothod' => $request->shipment,
            'user_id' => auth()->user()->id,
            'user_name' => auth()->user()->nome,
            'email' => auth()->user()->email,
            'telemovel' => auth()->user()->telemovel,
            'total' => \Cart::getTotal(),
            'sub_total' => \Cart::getSubTotal(),
        ]);

        foreach (\Cart::getContent() as $item) {

            $produtos = UserProduct::create([
                'product_id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'image' => $item->attributes->image,
                'user_id' => auth()->user()->id,
                'order_id' => $user_order->id,
                'pescador_id' => $item->attributes->pescador_id,
            ]);

            $itemQty = $item->price * $item->quantity;
            $value = $itemQty - $itemQty * ($item->attributes->margem/100);

            SellToWallet::create([
                'pescador_id' => $item->attributes->pescador_id,
                'product_id' =>  $item->id,
                'value' => $value,
                
            ]);

            $quantidade = Produto::find($item->id);
            $quantidade->quantidade_kg = $quantidade->quantidade_kg - $item->quantity;
            $quantidade->save();

            PescadorPedido::create([
                'pescador_id' => $item->attributes->pescador_id,
                'order_id' => $user_order->id,
                'adress' => $request->adress,
                'produtos' => $produtos->id,
                'user_id' => auth()->user()->id,
            ]);

     
        }



        \Cart::clear();
        return redirect()->route('store.thanks');
    }

    public function thanks()
    {
        return view('store.pages.painel.thanks');
    }
}
