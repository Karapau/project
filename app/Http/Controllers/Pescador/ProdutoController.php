<?php

namespace App\Http\Controllers\Pescador;

use App\Http\Controllers\Controller;
use App\Models\Especie;
use App\Models\Porto;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portos = Porto::all();
        $especies = Especie::all();

        return view('pescador.pages.produto.create', compact('portos', 'especies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
       $produtos = Produto::with('especies')->where('pescador_id', auth()->user()->id)->get();
    //    dd($produtos);
       return view('pescador.pages.produto.list', compact('produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = auth()->user()->id;

        $produto = Produto::create([
            'pescador_id' => $user,
            'especie_id' => $request->especie_id,
            'porto_id' => $request->porto_id,
            'embarcacao' => $request->embarcacao,
            'zona' => $request->zona,
            'tamanho' => $request->tamanho,
            'quantidade_kg' => $request->quantidade_kg ? $request->quantidade_kg : $request->total_kg,
            'quantidade_unidade' => $request->quantidade_unidade,
            'arte' => $request->arte,
            'preco' => $request->preco,
            'unidade' => $request->unidade,
            // 'kg' => $request->kg,
            // 'image' => $request->image,
            // 'status' => $request->status,
        ]);
        return redirect()->route('pescador.index')->with('success', 'Criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);

        $produto->delete();
        return redirect()->route('pescador.index')->with('success', 'Deletado com sucesso!');
    }
}
