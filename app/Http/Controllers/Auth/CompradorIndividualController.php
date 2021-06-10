<?php

namespace App\Http\Controllers\Auth;

use App\Models\Mails;
use App\Mail\AdminMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CompradorIndividual;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompradorIndividualMail;


class CompradorIndividualController extends Controller
{

    public function index()
    {
        return view('auth.comprador-individual.create');
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
            'email' => 'required|unique:comprador_individuals|max:255',
            'nome' => 'required',
        ]);

        $random = Str::random(9);
        $user = auth()->guard('consultor')->user()->id;
        $dados = $request->all();
        $save = CompradorIndividual::create([
            'user_id' => $user,
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'email' => $request->email,
            'password' => Hash::make($random),
            'telemovel' => $request->telemovel,
            'morada' => $request->morada,
            'nif' => $request->nif,
            'codigo' =>  $random,
        ]);


        // $mails = new Mails();
        // $mails['consultor'] = auth()->user()->name;
        // $mails['nome'] = $request->nome;
        // $mails['email'] = $request->email;
        // $mails['senha'] = $random;

        // Mail::to('cadastros@karapau.pt')->send(new AdminMail($mails));

        // $mails = new Mails();
        // $mails['nome'] = $request->nome;
        // $mails['email'] = $request->email;
        // $mails['senha'] = $random;

        // Mail::to($request->email)->send(new CompradorIndividualMail($mails));

        return redirect()->route('consultor')->with('success', 'Comprador criado com sucesso!');
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
        $comprador = CompradorIndividual::find($id);

        $comprador->nome =     $request->get('nome');
        $comprador->sobrenome = $request->get('sobrenome');
        $comprador->telemovel = $request->get('telemovel');
        $comprador->password = Hash::make($request->get('password'));
    

        $comprador->save();

        return redirect()->back()->with('success', 'alterado com sucesso!');
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
