<?php

namespace App\Http\Controllers;

use App\Models\Comprador;
use Apoca\Sibs\Facade\Sibs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TesteController extends Controller
{
    public function index(Request $request)
    {
        $request = [
            'amount' => 102.34,
            'currency' => 'EUR',
            'brand' => 'VISA',
            'type' => 'DB',
            'number' => 4200000000000000,
            'holder' => 'Jane Jones',
            'expiry_month' => 05,
            'expiry_year' => 2020,
            'cvv' => 123,
            'optionalParameters' => [],
        ];
        $response = Sibs::checkout($request)->pay();
       return $response;
    }


}
