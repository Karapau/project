<?php

namespace App\Http\Controllers;

use App\Models\Comprador;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index()
    {
        $comprador = Comprador::with('coletivos', 'comercial')->get();
        dd($comprador);
    }
}
