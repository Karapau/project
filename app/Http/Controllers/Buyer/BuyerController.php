<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Comprador;
use App\Models\CompradorIndividual;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function individual($id)
    {
        $user = Comprador::find($id);
        return view('store.pages.user.edit-ind', compact('user'));
    }
    public function coletivo()
    {
        return view('store.pages.user.edit-col');
    }
}
