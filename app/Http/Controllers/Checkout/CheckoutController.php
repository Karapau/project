<?php

namespace App\Http\Controllers\Checkout;

use App\Models\Produto;
use App\Models\PortoTax;
use App\Models\UserOrder;
use App\Models\AdressBuyer;
use App\Models\ShippingTax;
use App\Models\UserProduct;
use Darryldecode\Cart\Cart;
use App\Models\SellToWallet;
use Illuminate\Http\Request;
use App\Models\PescadorPedido;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function adress()
    {
        $adresses = AdressBuyer::where('user_id', auth()->user()->id)->get();
        return view('store.pages.painel.endereco', compact('adresses'));
    }
    public function index()
    {
        // $taxa = PortoTax::where('porto_id', $id)->orderBy('created_at', 'desc')->first();
        $adresses = AdressBuyer::where('user_id', auth()->user()->id)->get();
        $shipping = ShippingTax::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        return view('store.pages.painel.checkout', compact('adresses', 'shipping'));
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
            'user_name' => auth()->user()->name,
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
