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
        $url = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=41.198284,-8.611175&destinations=41.057029,-8.473592&key=AIzaSyCcTnukB7zVZVr3T-Pk6-Lptswge0BDOXg');
        return $url;
    }


}
