<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InicioController extends Controller
{
	public function index(){
		 $var = \DB::select('SELECT data, nome, imagem from funcionario f, registro r WHERE f.id = r.func_id AND local_trabalho = "Acerco Talatona" AND data = CURRENT_DATE');

		 $numero = \DB::select('SELECT COUNT(r.id) as numero from funcionario f, registro r WHERE f.id = r.func_id AND local_trabalho = "Acerco Talatona" AND data = CURRENT_DATE');

        $dados = \DB::select('SELECT data, nome, imagem from funcionario f, registro r WHERE f.id = r.func_id AND local_trabalho = "Acervo Benfica" AND data = CURRENT_DATE');

        $numero1 = \DB::select('SELECT COUNT(r.id) as numero from funcionario f, registro r WHERE f.id = r.func_id AND local_trabalho = "Acervo Benfica" AND data = CURRENT_DATE');

        return view('admin.presente', ['dados' => $dados, 'var' => $var, 'numero' => $numero, 'numero1' => $numero1]);

    }

     public function index1(){
    	return view('admin.ponto-facial');
    }
}
