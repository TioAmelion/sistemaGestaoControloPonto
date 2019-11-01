<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsuarioController extends Controller
{
    public function index(){
    	$dados = User::all();
    	return view('auth.index', compact('dados'));
    }

    public function edit($id){
    	$dados = User::find($id);
    	return view('auth.update', compact('dados', $dados));
    }

    public function update(Request $request, $id){
    	User::findOrFail($id)->update($request->all());
    	return redirect('usuarios');
    }
}
