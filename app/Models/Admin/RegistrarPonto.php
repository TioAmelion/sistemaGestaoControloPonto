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
    	$filtro = DB::select('SELECT f.nome, f.id,
        (SELECT DISTINCT r.empresa FROM registro r WHERE r.func_id = f.id) As empresa,
        (SELECT COUNT(func_id) FROM registro r WHERE r.func_id = f.id AND status = "presente") As presencas, 
        (SELECT COUNT(func_id) FROM registro r WHERE r.func_id = f.id AND status = "ausente")  as ausencias,
        (SELECT f.faixa_salarial-COUNT(func_id) FROM registro r WHERE r.func_id = f.id AND status = "ausente")  as salario
        FROM funcionario f WHERE EXISTS (SELECT r.func_id FROM registro r WHERE r.func_id = f.id)');

    	return $filtro;
    }

    public function ponto_individual($id){

        $filtro = DB::select("SELECT r.func_id as Numero_funcionario , r.empresa as Empresa, f.nome, r.data, r.entrada as Hora_Entrada, r.saida_a as Saída_Almoço, r.entrada_a as Entrada_Almoço, r.saida as Fim_expediente FROM registro r, funcionario f WHERE r.func_id = '$id' AND f.id = '$id' ");
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
