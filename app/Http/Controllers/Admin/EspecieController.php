<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Especie;
use Intervention\Image\ImageManagerStatic;

class EspecieController extends Controller
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
        return view('painel.pages.especies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $img = ImageManagerStatic::make($data['image']);
        $name = Str::random() . '.jpg';

        $originalPath = storage_path('app/public/especies/');

        $img->save($originalPath . $name);

        $especie = Especie::create([
            'nome_portugues' => $data['nome_portugues'],
            'nome_ingles' => $data['nome_ingles'],
            'nome_espanhol' => $data['nome_espanhol'],
            'nome_cientifico' => $data['nome_cientifico'],
            'codigo_fao' => $data['codigo_fao'],
            'codigo_lota' => $data['codigo_lota'],
            'tamanho_minimo' => $data['tamanho_minimo'],
            'image' => $name,
            'margem' => $data['margem'],
        ]);

        return redirect()->route('admin.especies')->with('success', "Espécie $especie->nome_portugues criado com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especie = Especie::findOrFail($id);
        return view('painel.pages.especies.edit', compact('especie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $especie = Especie::find($id);

        $data = $request->all();

        if ($request->image != '') {
            $path = storage_path('app/public/especies/');

            //code for remove old file
            if ($especie->image != ''  && $especie->image != null) {
                $file_old = $path . $especie->image;
                unlink($file_old);
            }

            //upload new file
            $img = ImageManagerStatic::make($data['image']);


            $name = Str::random() . '.jpg';

            $originalPath = storage_path('app/public/especies/');

            $img->save($originalPath . $name);

            //for update in table
            $especie->update(['image' => $name]);
        }


        $especie->nome_portugues =     $request->get('nome_portugues');
        $especie->nome_ingles = $request->get('nome_ingles');
        $especie->nome_espanhol = $request->get('nome_espanhol');
        $especie->nome_cientifico = $request->get('nome_cientifico');
        $especie->codigo_fao = $request->get('codigo_fao');
        $especie->codigo_lota = $request->get('codigo_lota');
        $especie->tamanho_minimo = $request->get('tamanho_minimo');
        $especie->margem = $request->get('margem');



        $especie->save();


        return redirect()->route('admin.especies')->with('success', 'especie alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especie = Especie::findOrFail($id);
        $especie->delete();
        return redirect()->route('admin.especies')->with('success', "Espécie $especie->nome_portugues deletado com sucesso!");
    }
}
