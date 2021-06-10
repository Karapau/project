<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultor;
use App\Models\Especie;
use App\Models\Porto;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    public function index()
    {
        return view('painel.pages.index');
    }
    public function especies()
    {
        $especies = Especie::paginate(15);
        return view('painel.pages.especies.index', compact('especies'));
    }

    public function porto()
    {
        $portos = Porto::paginate(15);
        return view('painel.pages.porto.index', compact('portos'));
    }

}
