<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Funcionario;
use App\Models\Admin\RegistrarPonto;
use App\Models\Admin\Faltas;
use App\Exports\PontoExport;
use App\Exports\PontoIndividualExport;
use App\Exports\ponto_individual_Export;
use Maatwebsite\Excel\Facades\Excel;

class PontoIndividualController extends Controller
{
    public function ponto_individual(){

    	$dados = funcionario::where('local_trabalho', 'Acervo Benfica')->get();

        return view('admin.ponto.folhaIndividual', compact('dados', $dados));
    }

    public function imprimir($id){

    	$d = new RegistrarPonto();
    	$dados = $d->ponto_individual($id);

    	//$export = new ponto_individual_Export();

    	//$ex = $export->collection($id);
    	return Excel::download($dados, 'ponto.xlsx');
    	//return view('admin.ponto.imprimirPonto', compact('dados'));
    }

    public function export($id){


    	return Excel::download(new ponto_individual_Export(), 'ponto.xlsx');
    }
}
