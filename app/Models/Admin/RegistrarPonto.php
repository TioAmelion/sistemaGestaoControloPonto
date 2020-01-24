<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RegistrarPonto extends Model
{
    protected $table = "registro";
    protected $fillable = ['func_id','data', 'entrada', 'saida_a', 'entrada_a', 'saida', 'status'];
    //protected $guarded = ['id'];

    public function dados(){
        $data_inicio = date('Y-m-01');
        $data_fim   = date('Y-m-31');
        $status = "presente";
        $status1 = "ausente";

    	$filtro = DB::select("SELECT f.nome, f.id,
        (SELECT DISTINCT r.empresa FROM registro r WHERE r.func_id = f.id) As empresa,
        (SELECT COUNT(func_id) FROM registro r WHERE r.func_id = f.id AND status = 'presente' AND data BETWEEN '$data_inicio' AND '$data_fim') as presencas, 
        (SELECT COUNT(func_id) FROM registro r WHERE r.func_id = f.id AND status = 'ausente' AND data BETWEEN '$data_inicio' AND '$data_fim')  as ausencias
        FROM funcionario f WHERE EXISTS (SELECT r.func_id FROM registro r WHERE r.func_id = f.id)");

    	return $filtro;

        //(SELECT f.faixa_salarial-COUNT(func_id) FROM registro r WHERE r.func_id = f.id AND status = 'ausente' AND data BETWEEN '$data_inicio' AND '$data_fim')  as salario
    }

    public function ponto_individual($id){

        $data_inicio = date('Y-m-01');
        $mes  = date('m');
        $ano  = date('Y');
        $ultimo_dia = date("t", mktime(0,0,0, $mes, '01', $ano));
        $data_fim   = date('Y-m-d');

        //$filtro = RegistrarPonto::all()->where('func_id', $id)->whereBetween('data', [$data_inicio, $data_fim]);
        $filtro = RegistrarPonto::where('registro.func_id', $id)->join('funcionario', 'registro.func_id', '=', 'funcionario.id')->whereBetween('data', [$data_inicio, $data_fim])->get();

        return $filtro;
    }

    public function verifica($id){

        $hoje = date('Y-m-d');
        $filtro = DB::select("SELECT r.data, r.entrada, r.saida_a, r.entrada_a, r.saida FROM registro r, funcionario f WHERE r.func_id = '$id' AND '$id' = f.id AND r.data = '$hoje' ");
        return $filtro;
    }

    public function verifica_saida_almoco($id){

        $hoje = date('Y-m-d');
        $filtro = DB::select("SELECT r.saida_a FROM registro r, funcionario f WHERE r.func_id = '$id' AND '$id' = f.id AND r.data = '$hoje' ");
        return $filtro;
    }
}
