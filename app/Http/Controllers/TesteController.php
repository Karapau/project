<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index()
    {
        $random = Str::random(9);

        return $random;
    }
}
