<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $permissoes = [10 => 'Admin', 3 => 'Entregador', 0 => 'Sem Permissão'];
        if(auth()->user()->permission == 10){
            $users = User::all();
        }else{
            $users = User::where('id', auth()->user()->id)->get();
        }
        return view('painel.pages.users.index', compact('users', 'permissoes'));
    }

    public function create(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'permission' => $request->permission,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users')->with('success', 'Usuario criado com sucesso!');
    }

    public function update(Request $request)
    {
        $userDados['name'] = $request->name;
        $userDados['permission'] = $request->permission;
        if($request->password) $userDados['password'] = Hash::make($request->password);

        $user = User::find($request->id)->update($userDados);

        return redirect()->route('admin.users')->with('success', 'Usuario atualizado com sucesso!');
    }
}
