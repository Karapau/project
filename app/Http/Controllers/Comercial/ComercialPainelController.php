<?php

namespace App\Http\Controllers\Comercial;

use App\Models\Comprador;
use Illuminate\Http\Request;
use App\Models\CompradorColetivo;
use Illuminate\Support\Facades\DB;
use App\Models\CompradorIndividual;
use App\Http\Controllers\Controller;
use App\Models\BuyerColective;
use App\Models\BuyerInduvidual;

class ComercialPainelController extends Controller
{

    public function index()
    {
        $comprador1 = Comprador::where('user_id', auth()->guard('consultor')->user()->id)->get();


        $inativos = Comprador::where('user_id', auth()->guard('consultor')->user()->id)->where('status', 0)->get();
        $ativos = Comprador::where('user_id', auth()->guard('consultor')->user()->id)->where('status', 1)->get();

        // $imcompletos_ind = CompradorIndividual::where('user_id', '=', 5)->orWhereNull('nif')->orWhereNull('sobrenome')->orWhereNull('telemovel')->orWhereNull('morada')->get();
        $imcompletos_inds = Comprador::with(['individuais', 'coletivos'])->where('user_id', auth()->guard('consultor')->user()->id)->get();

        $incomplete_ind = [];



        foreach ($imcompletos_inds as $imcompletos_ind) {
            $isValid = false;
            $type2 = $imcompletos_ind->type == 'individual' ? 'individuais' : 'coletivos';
            $type = $imcompletos_ind->type == 'individual' ? 'coletivos' : 'individuais';
            // var_dump($imcompletos_ind->coletivos);
            // printf('<pre>%s</pre>', print_r($imcompletos_ind));
            foreach (json_decode(json_encode($imcompletos_ind)) as $key => $value) {
                // echo "<pre>".print_r([$key, $value])."</pre>" ;
                // printf('<pre>%s</pre>', print_r($key.'=>'.$value, 1));
                if($key == $type2){
                    foreach($value as $key2 => $value2){
                        //    echo "<pre>".print_r([$key2, $value2])."</pre>" ;
                        foreach($value2 as $key3 => $value3){

                        if ($value3 == null) {
                            
                                $isValid = true;
                        }
                    }
                    }
                }
                if ($value == null) {
                    if($key !== $type)
                        $isValid = true;
                }
            }
            if ($isValid) {
                $incomplete_ind[] = $imcompletos_ind;
            }
        }
        // exit();
        return view('comercial.pages.home', compact('incomplete_ind', 'comprador1', 'inativos', 'ativos'));
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
        $ativos_coletivo = Comprador::with('individuais', 'coletivos')->where('user_id', auth()->guard('consultor')->user()->id)->where('status', 1)->get();

        return view('comercial.pages.compradores-ativos', compact('comprador1', 'comprador2', 'ativos_coletivo', 'ativos_individual',));
    }
    public function compradorListInativo()
    {
        $comprador1 = CompradorIndividual::where('user_id', auth()->guard('consultor')->user()->id)->get();
        $comprador2 = CompradorColetivo::where('user_id', auth()->guard('consultor')->user()->id)->get();

        $inativos_individual = Comprador::with('individuais', 'coletivos')->where('user_id', auth()->guard('consultor')->user()->id)->where('status', 0)->get();


        return view('comercial.pages.compradores-inativos', compact('inativos_individual'));
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
        $imcompletos_inds = Comprador::with(['individuais', 'coletivos'])->where('user_id', auth()->guard('consultor')->user()->id)->get();

        $incomplete_ind = [];



        foreach ($imcompletos_inds as $imcompletos_ind) {
            $isValid = false;
            $type2 = $imcompletos_ind->type == 'individual' ? 'individuais' : 'coletivos';
            $type = $imcompletos_ind->type == 'individual' ? 'coletivos' : 'individuais';
            // var_dump($imcompletos_ind->coletivos);
            // printf('<pre>%s</pre>', print_r($imcompletos_ind));
            foreach (json_decode(json_encode($imcompletos_ind)) as $key => $value) {
                // echo "<pre>".print_r([$key, $value])."</pre>" ;
                // printf('<pre>%s</pre>', print_r($key.'=>'.$value, 1));
                if($key == $type2){
                    foreach($value as $key2 => $value2){
                        //    echo "<pre>".print_r([$key2, $value2])."</pre>" ;
                        foreach($value2 as $key3 => $value3){

                        if ($value3 == null) {
                            
                                $isValid = true;
                        }
                    }
                    }
                }
                if ($value == null) {
                    if($key !== $type)
                        $isValid = true;
                }
            }
            if ($isValid) {
                $incomplete_ind[] = $imcompletos_ind;
            }
        }

        return view('comercial.pages.lead-list', compact('incomplete_ind'));
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
        $comprador = Comprador::with('individuais', 'coletivos')->find($id);
        if ($comprador->type == 'individual') {
            return view('comercial.pages.edit-ind', compact('comprador'));
        } else {
            return view('comercial.pages.edit-col', compact('comprador'));
        }
    }
    public function editColetivo($id)
    {
        $comprador_col = CompradorColetivo::find($id);
        return view('comercial.pages.edit-col', compact('comprador_col'));
    }

    public function updateIndividual(Request $request, $id)
    {
        $comprador = Comprador::with('individuais', 'coletivos')->find($id);


        $comprador->name =     $request->get('name');
        $comprador->lastname = $request->get('lastname');
        $comprador->email = $request->get('email');
        $comprador->telemovel = $request->get('telemovel');
        $comprador->save();

        $ind = BuyerInduvidual::where('comprador_id', $comprador->id)->update(array(
            'morada' => $request->get('morada'),
            'nif' => $request->get('nif'),
        ));



        return redirect()->route('consultor')->with('success', 'Comprador alterado com sucesso!');
    }

    public function updateColetivo(Request $request, $id)
    {
        $comprador = Comprador::with('individuais', 'coletivos')->find($id);


        $comprador->name =     $request->get('name');
        $comprador->email = $request->get('email');
        $comprador->telemovel = $request->get('telemovel');
        $comprador->save();


        $ind = BuyerColective::where('comprador_id', $comprador->id)->update(array(
            'morada' => $request->get('morada'),
            'nif' => $request->get('nif'),
            'telefone' => $request->get('telefone'),
            'telemovel_empresa' => $request->get('telemovel_empresa'),
            'contato' => $request->get('contato'),
            'tipo' => $request->get('tipo'),
        ));





        return redirect()->route('consultor')->with('success', 'Comprador alterado com sucesso!');
    }
}
