<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Funcionario;
use App\Models\Admin\RegistrarPonto;
use Carbon\Carbon;

class PontoQrCodeController extends Controller
{
	public function index(){

		return view('admin.pontoQrCode.ponto-facial');
	}

    public function checkUser(Request $request) {

		$result =0;

		if ($request->data) {

			$user = Funcionario::find($request->data);
			$result = $user;
			$id = $request->data;

			$hora1      = strtotime(date('Y-m-d' . '12:00:00'));
	        $hora2      = strtotime(date('Y-m-d' . '17:00:00'));
	        $hora3      = strtotime(date('Y-m-d' . '14:00:00'));
	        $horaAtual  = strtotime(date('Y-m-d'. 'H:i:s'));

	        //verifica se o funcionario já marcou o ponto(entrada)
	        $dados = new RegistrarPonto();
	        $d = $dados->verifica($id);

	        //verifica se o funcionario já marcou o ponto(almoço)
	        $dados = new RegistrarPonto();
	        $saida_a = $dados->verifica_saida_almoco($id);

	        //Pegar a hora atual
	        date_default_timezone_set('Africa/Luanda');
	        $agora = Date('H:i');

	        foreach ($d as $key){

	        }

	        if(empty($d)){

	            $status = "presente";
	            $request = array(
	                 'entrada' => $agora,
	                 'data' => date('Y-m-d'),
	                 'func_id' => $id,
	                 'status' => $status
	                 );
	            
	            RegistrarPonto::create($request);
	            return response()->json(['success' => 'Ponto Marcado', 'nome_func' => $user]);

	        }elseif(empty($key->saida_a) && strtotime(date('Y-m-d'. 'H:i:s')) >= strtotime(date('Y-m-d' . '13:00:00')) && strtotime(date('Y-m-d'. 'H:i:s')) <= strtotime(date('Y-m-d' . '14:00:00'))){
	            date_default_timezone_set('Africa/Luanda');
	            $agora = Date('H:i');

	            RegistrarPonto::where('func_id', $id)->update(['saida_a' => $agora]);
	            return response()->json(['success' => 'Ponto Marcado - Hora do almoço', 'nome_func' => $user]);
	            
	       
	        }elseif(empty($key->entrada_a) && strtotime(date('Y-m-d'. 'H:i:s')) >= strtotime(date('Y-m-d' . '14:00:00')) && strtotime(date('Y-m-d'. 'H:i:s')) <= strtotime(date('Y-m-d' . '14:15:00')) ){

	            date_default_timezone_set('Africa/Luanda');
	            $agora = Date('H:i');

	            RegistrarPonto::where('func_id', $id)->update(['entrada_a' => $agora]);
	            return response()->json(['success' => 'Ponto Marcado - Regresso ao almoço', 'nome_func' => $user]);
	            
	        }elseif(empty($key->saida) && strtotime(date('Y-m-d'. 'H:i:s')) >= strtotime(date('Y-m-d' . '16:30:00'))){

	            date_default_timezone_set('Africa/Luanda');
	            $agora = Date('H:i');

	            RegistrarPonto::where('func_id', $id)->update(['saida' => $agora]);
	            return response()->json(['success' => 'Ponto Marcado - Fim de expediente', 'nome_func' => $user]);

	        }else{
	        	return response()->json(['success' => 'Nao inseriu', 'nome_func' => $user]);
		}
	}
		return response()->json(['success' => 'Ponto Marcado com sucesso', 'nome_func' => $user]);
	}
}
