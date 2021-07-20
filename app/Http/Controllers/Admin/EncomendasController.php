<?php

namespace App\Http\Controllers\Admin;

use App\Models\PayImage;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EncomendasController extends Controller
{
    public function index()
    {

        $orders = UserOrder::with('enderecos','payimage')->orderBy('created_at', 'desc')->paginate(15);
        return view('painel.pages.encomendas.index', compact('orders'));
    }

    public function download($id)
    {
        $comprovante = PayImage::where('order_id', $id)->orderBy('created_at', 'desc')->first();
        $filepath = public_path('storage/comprovantes/'.$comprovante->path);

        return response()->download($filepath);
    }
}
