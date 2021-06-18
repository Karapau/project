<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mails;
use App\Models\Consultor;
use Illuminate\Http\Request;
use App\Models\CompradorColetivo;
use App\Mail\CompradorColetivoMail;
use App\Models\CompradorIndividual;
use App\Http\Controllers\Controller;
use App\Models\Comprador;
use Illuminate\Support\Facades\Mail;

class ComercialController extends Controller
{
  public function index()
  {
    $consultores = Consultor::paginate(15);
    return view('painel.pages.consultores.index', compact('consultores'));
  }

  public function create()
  {
    return view('painel.pages.consultores.create');
  }
  public function clientes($id)
  {
    $comprador1 = Comprador::where('user_id', $id)->get();
    $comprador2 = CompradorColetivo::where('user_id', $id)->get();
    return view('painel.pages.consultores.clientes', compact('comprador1', 'comprador2'));
  }

  public function emailIndividual($id)
  {
    $comprador1 = Comprador::where('id', $id)->get();
    $mails = new Mails();
    $mails['email'] = $comprador1[0]->email;
    $mails['senha'] = $comprador1[0]->codigo;

    Mail::to($comprador1[0]->email)->send(new CompradorColetivoMail($mails));

     return redirect()->back();
  }
  public function emailColetivo($id)
  {
    $comprador1 = CompradorColetivo::where('id', $id)->get();
    $mails = new Mails();
    $mails['email'] = $comprador1[0]->email;
    $mails['senha'] = $comprador1[0]->codigo;
    
    Mail::to($comprador1[0]->email)->send(new CompradorColetivoMail($mails));
    return redirect()->back();
  }
}
