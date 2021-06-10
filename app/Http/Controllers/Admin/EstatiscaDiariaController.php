<?php

namespace App\Http\Controllers\Admin;

use App\Models\Porto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Especie;
use App\Models\EspecieToPorto;
use App\Models\EstatisticaDiaria;

class EstatiscaDiariaController extends Controller
{
  public function index($id)
   {

    $porto = Porto::with('especies')->where('id', $id)->get()->first();
   
  $estatisticas = EstatisticaDiaria::where('porto_id', $id)->get();

     return view('painel.pages.porto.estatistica', compact('porto', 'estatisticas'));
   }

   public function store(Request $request)
   {
    $data = EstatisticaDiaria::create($request->all());
    return redirect()->back()->with('success', 'Criado com sucesso!');
   }
}
