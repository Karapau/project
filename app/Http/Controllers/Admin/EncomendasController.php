<?php

namespace App\Http\Controllers\Admin;

use App\Models\PayImage;
use App\Models\UserOrder;
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

        $orders  = PescadorPedido::with('adresses', 'orders', 'products', 'users', 'pescador')->get();
        return view('painel.pages.encomendas.index', compact('orders'));
    }

    public function download($id)
    {
        $comprovante = PayImage::where('order_id', $id)->orderBy('created_at', 'desc')->first();
        $filepath = public_path('storage/comprovantes/'.$comprovante->path);

        return response()->download($filepath);
    }
    public function status(Request $request, $id)
    {
        $porto = UserProduct::find($id);
        $porto->status = $request->get('status');
        $porto->save();

    
        return redirect()->back();
    }
}
