<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EncomendasController extends Controller
{
    public function index()
    {
        $orders = UserOrder::with('enderecos')->orderBy('created_at', 'desc')->paginate(15);
        return view('painel.pages.encomendas.index', compact('orders'));
    }
}
