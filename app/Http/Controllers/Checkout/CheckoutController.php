<?php

namespace App\Http\Controllers\Checkout;

use App\Models\Produto;
use App\Models\PayImage;
use App\Models\PortoTax;
use App\Models\Comprador;
use App\Models\UserOrder;
use App\Models\WalletCom;
use App\Models\AdressBuyer;
use App\Models\ShippingTax;
use App\Models\UserProduct;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Str;
use App\Models\SellToWallet;
use Illuminate\Http\Request;
use App\Models\PescadorPedido;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic;

class CheckoutController extends Controller
{
    public function adress()
    {
        $adresses = AdressBuyer::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        return view('app-front.store.pages.adress', compact('adresses'));
    }
    public function index()
    {
        // $taxa = PortoTax::where('porto_id', $id)->orderBy('created_at', 'desc')->first();
        $adresses = AdressBuyer::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        $shipping = ShippingTax::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();

        if(\Cart::isEmpty()){
            return redirect()->route('store.porto');
        }

        return view('app-front.store.pages.checkout', compact('adresses', 'shipping'));
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
            'total' => $request->totalval,
            'frete' => $request->freteval,
            'sub_total' => \Cart::getSubTotal(),
        ]);

        foreach (\Cart::getContent() as $item) {


            $itemQty = $item->price * $item->quantity;
            $value = $itemQty - $itemQty * ($item->attributes->margem/100);


            $produtos = UserProduct::create([
                'product_id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'value' => $value,
                'total_value' => $itemQty,
                'quantity' => $item->quantity,
                'image' => $item->attributes->image,
                'user_id' => auth()->user()->id,
                'order_id' => $user_order->id,
                'pescador_id' => $item->attributes->pescador_id,
            ]);

           $wallet = SellToWallet::create([
                'pescador_id' => $item->attributes->pescador_id,
                'product_id' =>  $item->id,
                'value' => $value,
            ]);

            $id = auth()->user()->id;
            $comprador = Comprador::with('comercial')->find($id);
            $valor = \Cart::getTotal() * (2/100);

            $walletCom = WalletCom::create([
                'user_id' => $comprador->comercial->id,
                'comprador_id' => $id,
                'pescador_id' => $item->attributes->pescador_id,
                'order_id' => $user_order->id,
                'product_id' => $item->id,
                'total' => \Cart::getTotal(),
                'value' => $valor,
            ]);

            $quantidade = Produto::find($item->id);
            $quantidade->quantidade_kg = $quantidade->quantidade_kg - $item->quantity;
            $quantidade->save();

          $pedido =  PescadorPedido::create([
                'pescador_id' => $item->attributes->pescador_id,
                'order_id' => $user_order->id,
                'adress' => $request->adress,
                'produtos' => $produtos->id,
                'wallet' => $wallet->id,
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

    public function payImage(Request $request)
{
        $data = $request->all();
        $img = ImageManagerStatic::make($data['comprovante']);
        $name = Str::random() . '.jpg';

        $originalPath = storage_path('app/public/comprovantes/');

        $img->save($originalPath . $name);

        $comprovante = PayImage::create([
            'user_id' => auth()->user()->id,
            'order_id' => $request->order_id,
            'path' => $name
        ]);
        $produto = UserOrder::find($request->order_id);
        $produto->status = 1;
        $produto->save();

        return redirect()->back()->with('success', 'Comprovante Enviado');
    }
}
