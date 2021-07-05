<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comprador;
use Illuminate\Http\Request;
use App\Models\BuyerColective;
use App\Models\BuyerInduvidual;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index()
    {


        $compradores = Comprador::with('individuais', 'coletivos', 'comercial')->paginate(15);

        return view('painel.pages.clientes.index', compact('compradores'));
    }

    public function editInd($id)
    {
        $comprador = Comprador::with('individuais', 'coletivos', 'comercial')->find($id);
        return view('painel.pages.clientes.edit-ind', compact('comprador'));
    }
    public function editCol($id)
    {
        $comprador = Comprador::with('individuais', 'coletivos', 'comercial')->find($id);
        return view('painel.pages.clientes.edit-col', compact('comprador'));
    }


    public function updateIndividual(Request $request, $id)
    {
        $comprador = Comprador::with('individuais', 'coletivos')->find($id);


        $comprador->name =     $request->get('name');
        $comprador->lastname = $request->get('lastname');
        $comprador->email = $request->get('email');
        $comprador->password = Hash::make($request->get('password'));
        $comprador->telemovel = $request->get('telemovel');
        $comprador->save();

        $ind = BuyerInduvidual::where('comprador_id', $comprador->id)->update(array(
            'morada' => $request->get('morada'),
            'nif' => $request->get('nif'),
        ));



        return redirect()->back()->with('success', 'Comprador alterado com sucesso!');
    }

    public function updateColetivo(Request $request, $id)
    {
        $comprador = Comprador::with('individuais', 'coletivos')->find($id);


        $comprador->name =     $request->get('name');
        $comprador->email = $request->get('email');
        $comprador->telemovel = $request->get('telemovel');
        $comprador->password = Hash::make($request->get('password'));
        $comprador->save();


        $ind = BuyerColective::where('comprador_id', $comprador->id)->update(array(
            'morada' => $request->get('morada'),
            'nif' => $request->get('nif'),
            'telefone' => $request->get('telefone'),
            'telemovel_empresa' => $request->get('telemovel_empresa'),
            'contato' => $request->get('contato'),
            'tipo' => $request->get('tipo'),
        ));


        return redirect()->back()->with('success', 'Comprador alterado com sucesso!');
    }

    public function ativar(Request $request, $id)
    {
        $comprador = Comprador::with('individuais', 'coletivos')->find($id);
        $comprador->status = $request->get('status');
        $comprador->save();
        return redirect()->back();
    }
}
