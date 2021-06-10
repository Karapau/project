<?php

namespace App\Http\Controllers\Comercial;

use Illuminate\Http\Request;
use App\Models\CompradorColetivo;
use Illuminate\Support\Facades\DB;
use App\Models\CompradorIndividual;
use App\Http\Controllers\Controller;

class ComercialPainelController extends Controller
{

    public function index()
    {
        $comprador1 = CompradorIndividual::where('user_id', auth()->guard('consultor')->user()->id)->get();
        $comprador2 = CompradorColetivo::where('user_id', auth()->guard('consultor')->user()->id)->get();

        $inativos_individual = CompradorIndividual::where('user_id', auth()->guard('consultor')->user()->id)->where('status', 0)->get();
        $ativos_individual = CompradorIndividual::where('user_id', auth()->guard('consultor')->user()->id)->where('status', 1)->get();
        $inativos_coletivo = CompradorColetivo::where('user_id', auth()->guard('consultor')->user()->id)->where('status', 0)->get();
        $ativos_coletivo = CompradorColetivo::where('user_id', auth()->guard('consultor')->user()->id)->where('status', 1)->get();

        // $imcompletos_ind = CompradorIndividual::where('user_id', '=', 5)->orWhereNull('nif')->orWhereNull('sobrenome')->orWhereNull('telemovel')->orWhereNull('morada')->get();
        $imcompletos_inds = CompradorIndividual::where('user_id', auth()->guard('consultor')->user()->id)->get();
   
        $incomplete_ind = [];

        foreach($imcompletos_inds as $imcompletos_ind){
            $isValid = false;
            
            // printf('<pre>%s</pre>', print_r($imcompletos_ind[]));
            foreach(json_decode(json_encode($imcompletos_ind)) as $key => $value){
                // printf('<pre>%s</pre>', print_r($key.'=>'.$value, 1));
                if($value == null) $isValid = true;
           
            }
            if($isValid){
                $incomplete_ind[] = $imcompletos_ind;
            }
        }

        $imcompletos_col = CompradorColetivo::where('user_id', auth()->guard('consultor')->user()->id)->get();


        $incomplete_col = [];

        foreach ($imcompletos_col as $imcompletos_col) {
            $isValid = false;

            // printf('<pre>%s</pre>', print_r($imcompletos_ind[]));
            foreach (json_decode(json_encode($imcompletos_col)) as $key => $value) {
                // printf('<pre>%s</pre>', print_r($key.'=>'.$value, 1));
                if ($value == null) $isValid = true;
            }
            if ($isValid) {
                $incomplete_col[] = $imcompletos_col;
            }
        }
        return view('comercial.pages.home', compact('incomplete_col', 'incomplete_ind', 'comprador1', 'comprador2', 'inativos_individual', 'ativos_individual', 'inativos_coletivo', 'ativos_coletivo'));
    }

    public function compradorCad()
    {
        return view('comercial.pages.cadastro');
    }

    public function compradorListAtivo()
    {
        $comprador1 = CompradorIndividual::where('user_id', auth()->guard('consultor')->user()->id)->get();
        $comprador2 = CompradorColetivo::where('user_id', auth()->guard('consultor')->user()->id)->get();

        $inativos_individual = CompradorIndividual::where('user_id', auth()->guard('consultor')->user()->id)->where('status', 0)->get();
        $ativos_individual = CompradorIndividual::where('user_id', auth()->guard('consultor')->user()->id)->where('status', 1)->get();
        $ativos_coletivo = CompradorColetivo::where('user_id', auth()->guard('consultor')->user()->id)->where('status', 1)->get();

        return view('comercial.pages.compradores-ativos', compact('comprador1', 'comprador2', 'ativos_coletivo', 'ativos_individual',));
    }
    public function compradorListInativo()
    {
        $comprador1 = CompradorIndividual::where('user_id', auth()->guard('consultor')->user()->id)->get();
        $comprador2 = CompradorColetivo::where('user_id', auth()->guard('consultor')->user()->id)->get();

        $inativos_individual = CompradorIndividual::where('user_id', auth()->guard('consultor')->user()->id)->where('status', 0)->get();
        $inativos_coletivo = CompradorColetivo::where('user_id', auth()->guard('consultor')->user()->id)->where('status', 0)->get();

        return view('comercial.pages.compradores-inativos', compact('inativos_individual', 'inativos_coletivo'));
    }

    public function listIndividual($id)
    {
        $comprador1 = CompradorIndividual::where('user_id', auth()->guard('consultor')->user()->id)->find($id);

        return view('comercial.pages.list-individual', compact('comprador1'));
    }
    public function listColetivo($id)
    {
        $comprador1 = CompradorColetivo::where('user_id', auth()->guard('consultor')->user()->id)->find($id);

        return view('comercial.pages.list-coletivo', compact('comprador1'));
    }

    public function incompleto()
    {
        $imcompletos_inds = CompradorIndividual::where('user_id', auth()->guard('consultor')->user()->id)->get();

        $incomplete_ind = [];

        foreach ($imcompletos_inds as $imcompletos_ind) {
            $isValid = false;

            // printf('<pre>%s</pre>', print_r($imcompletos_ind[]));
            foreach (json_decode(json_encode($imcompletos_ind)) as $key => $value) {
                // printf('<pre>%s</pre>', print_r($key.'=>'.$value, 1));
                if ($value == null) $isValid = true;
            }
            if ($isValid) {
                $incomplete_ind[] = $imcompletos_ind;
            }
        }

        $imcompletos_col = CompradorColetivo::where('user_id', auth()->guard('consultor')->user()->id)->get();


        $incomplete_col = [];

        foreach ($imcompletos_col as $imcompletos_col) {
            $isValid = false;

            // printf('<pre>%s</pre>', print_r($imcompletos_ind[]));
            foreach (json_decode(json_encode($imcompletos_col)) as $key => $value) {
                // printf('<pre>%s</pre>', print_r($key.'=>'.$value, 1));
                if ($value == null) $isValid = true;
            }
            if ($isValid) {
                $incomplete_col[] = $imcompletos_col;
            }
        }
        return view('comercial.pages.lead-list', compact('incomplete_col', 'incomplete_ind'));
    }

    public function lead()
    {
        return view('comercial.pages.lead');
    }

    public function leadForm1()
    {
        return view('comercial.pages.lead-individual');
    }
    public function leadForm2()
    {
        return view('comercial.pages.lead-coletivo');
    }

    public function editIndividual($id)
    {
        $comprador_ind = CompradorIndividual::find($id);
        return view('comercial.pages.edit-ind', compact('comprador_ind'));
    }
    public function editColetivo($id)
    {
        $comprador_col = CompradorColetivo::find($id);
        return view('comercial.pages.edit-col', compact('comprador_col'));
    }

    public function updateIndividual(Request $request, $id)
    {
        $comprador = CompradorIndividual::find($id);


        $comprador->nome =     $request->get('nome');
        $comprador->sobrenome = $request->get('sobrenome');
        $comprador->email = $request->get('email');
        $comprador->telemovel = $request->get('telemovel');
        $comprador->morada = $request->get('morada');
        $comprador->nif = $request->get('nif');

        $comprador->save();


        return redirect()->route('consultor')->with('success', 'Comprador alterado com sucesso!');
    }

    public function updateColetivo(Request $request, $id)
    {
        $comprador = CompradorColetivo::find($id);


        $comprador->nome =     $request->get('nome');
        $comprador->telefone = $request->get('telefone');
        $comprador->telemovel_empresa = $request->get('telemovel_empresa');
        $comprador->email = $request->get('email');
        $comprador->morada = $request->get('morada');
        $comprador->nif = $request->get('nif');
        $comprador->contato = $request->get('contato');
        $comprador->telemovel = $request->get('telemovel');
        $comprador->tipo = $request->get('tipo');

        $comprador->save();


        return redirect()->route('consultor')->with('success', 'Comprador alterado com sucesso!');
    }
}
