<?php

namespace App\Http\Controllers\Auth;

use App\Models\Consultor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic;
use Session;

class LoginConsultorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app-front.comercial.auth.login');
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
        $data = $request->all();
        $img = ImageManagerStatic::make($data['image']);
        $name = Str::random() . '.jpg';

        $originalPath = storage_path('app/public/comerciais/');

        $img->save($originalPath . $name);

        $save = Consultor::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $name,
            'morada' => $request->morada,
            'iban' => $request->iban,
            'nif' => $request->nif
        ]);

        return redirect()->route('admin.consultores')->with('success', "Consultor $request->name criado com sucesso");
    }

    public function login(Request $request)
    {
        if (Auth::guard('consultor')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('consultor');
        }
        return redirect('consultor-login');
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
        $consultor = Consultor::findOrFail($id);
        return view('painel.pages.consultores.edit', compact('consultor'));
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
        $consultor = Consultor::find($id);

        $data = $request->all();

        if ($request->image != '') {
            $path = storage_path('app/public/comerciais/');

            //code for remove old file
            if ($consultor->image != ''  && $consultor->image != null) {
                $file_old = $path . $consultor->image;
                unlink($file_old);
            }

            //upload new file
            $img = ImageManagerStatic::make($data['image']);


            $name = Str::random() . '.jpg';

            $originalPath = storage_path('app/public/comerciais/');

            $img->save($originalPath . $name);

            //for update in table
            $consultor->update(['image' => $name]);
        }
        $consultor->name =     $request->get('name');
        $consultor->lastname = $request->get('lastname');
        $consultor->email = $request->get('email');
        $consultor->password = Hash::make($request->get('password'));
        $consultor->morada = $request->get('morada');
        $consultor->iban = $request->get('iban');
        $consultor->nif = $request->get('nif');
        // $consultor->image = $name;

        $consultor->save();

        return redirect()->route('admin.consultores')->with('success', "$request->name alterado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultor = Consultor::findOrFail($id);
        $consultor->delete();
        return redirect()->back()->with('success', 'Consultor deletado com sucesso!');
    }

    public function logout()
    {

        Auth::logout();

        return redirect('consultor-login');
    }
}
