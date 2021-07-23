<?php

namespace App\Http\Controllers\Buyer;

use App\Models\Comprador;
use Illuminate\Http\Request;
use App\Models\CompradorIndividual;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
    public function logout()
    {

        Auth::logout();

        return redirect('store-login-page');
    }
}
