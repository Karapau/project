<?php

namespace App\Http\Controllers;

use App\Models\Comprador;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TesteController extends Controller
{
    public function index()
    {

       $url = Http::get('https://api.duminio.com/ptcp/ptapi60ec808f3e8951.33243239/4460794');

       return $url;
    }


}
