<?php

namespace App\Http\Controllers\Auth;

use App\Models\Porto;
use App\Models\Pescador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PescadorRegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required',
            'name' => 'required',
            'nif' => 'required',
            'iban' => 'required',
        ]);
    
        $dados = Pescador::create([
            'name' =>          $request->name,
            'lastname' =>       $request->lastname,
            'email' =>         $request->email,
            'password' => Hash::make($request->password),
            'telefone' =>       $request->telefone,
            'morada' =>         $request->morada,
            'nif' =>            $request->nif,
            'iban' =>           $request->iban,
            'porto' =>          $request->porto,
            'nome_embarcacao' => $request->nome_embarcacao,
            'nome_embarcacao2' => $request->nome_embarcacao2,
            'nome_embarcacao3' => $request->nome_embarcacao3,

        ]);

        return redirect()->back()->with('success', 'Usuario criado com sucesso');
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
        //
    }
}
