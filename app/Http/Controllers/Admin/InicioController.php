<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InicioController extends Controller
{
	public function index(){
		 $var = \DB::select('SELECT data, nome, imagem from funcionario f, registro r WHERE f.id = r.func_id AND local_trabalho = "Acerco Talatona" AND data = CURRENT_DATE');

        $dados = \DB::select('SELECT data, nome, imagem from funcionario f, registro r WHERE f.id = r.func_id AND local_trabalho = "Acervo Benfica" AND data = CURRENT_DATE');

        return view('home1', ['dados' => $dados, 'var' => $var]);
}
}
