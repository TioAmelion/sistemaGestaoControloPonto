<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Funcionario;
use App\Models\Admin\RegistrarPonto;
use App\Models\Admin\Faltas;
use App\Exports\PontoExport;
use Maatwebsite\Excel\Facades\Excel;

class RegistrarPontoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dados = funcionario::where('local_trabalho', 'Acervo Benfica')->get();
        return view('admin.ponto.index', compact('dados'));
    }

    public function index1()
    {
        $dados = funcionario::where('local_trabalho', 'Acerco Talatona')->get();
        return view('admin.ponto.talatona', compact('dados'));
    }

    public function imprimir(){

        $dados = \DB::select('SELECT f.nome, f.id, f.imagem,
        (SELECT COUNT(func_id) FROM registro r WHERE r.func_id = f.id AND status = "presente") As presencas, 
        (SELECT COUNT(func_id) FROM registro r WHERE r.func_id = f.id AND status = "ausente")  as ausencias,
        (SELECT f.faixa_salarial-COUNT(func_id) FROM registro r WHERE r.func_id = f.id AND status = "ausente")  as salario
        FROM funcionario f WHERE EXISTS (SELECT r.func_id FROM registro r WHERE r.func_id = f.id)');

        return view('admin.ponto.imprimir', compact('dados', $dados));
    }

    public function ponto_individual($id){

         $filtro = new RegistrarPonto();
         $dados = $dados->ponto_individual($id);
         dd($dados);
         //return Excel::download(new ponto_individual_Export(), 'ponto.xlsx');
    }

    public function export() 
    {
        return Excel::download(new PontoExport(), 'ponto.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // authtoken  1PPv8t3L6ZulH5GMM6k2UEJM4jr_7CiUFac5MNqbS9dN25PPY
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        
        $hora1      = strtotime(date('H:i'));
        $hora2      = strtotime('14:59');
        $horaAtual  = strtotime(date('H:i'));

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
                 return redirect('marcar.ponto');
            echo "entrada vazia";

        }elseif(empty($key->saida_a)){

            date_default_timezone_set('Africa/Luanda');
            $agora = Date('H:i');

            RegistrarPonto::where('func_id', $id)->update(['saida_a' => $agora]);
            return redirect('marcar.ponto');
            echo "almoco vazia";

        }elseif(empty($key->entrada_a)){

            date_default_timezone_set('Africa/Luanda');
            $agora = Date('H:i');

            RegistrarPonto::where('func_id', $id)->update(['entrada_a' => $agora]);
            return redirect('marcar.ponto');
            echo "almoco vazia";
            
        }elseif(empty($key->saida)){

            date_default_timezone_set('Africa/Luanda');
            $agora = Date('H:i');

            RegistrarPonto::where('func_id', $id)->update(['saida' => $agora]);
            return redirect('marcar.ponto');
            echo "almoco vazia";
        }
        
        
     }

     public function marcar_falta($id)
    {
        $pegar = $id;
        $status = "ausente";
        $falta = "00:00";
        $request = array(
            'entrada' => $falta,
            'data' => date('Y-m-d'),
            'saida_a' => $falta,
            'entrada_a' => $falta,
            'saida' => $falta,
            'status' => $status,
            'func_id' => $id
        );
        RegistrarPonto::create($request);

        //Inserir na tabela faltas
        $request_f = array(
            'data' => date('Y-m-d'),
            'func_id' => $id
        );
        Faltas::create($request_f);

        return redirect('marcar.ponto');
            
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = funcionario::find($id);
        //return view('admin.ponto.index')->with('dados', $dados);
         return response()->json(['dados' => $dados]);
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
         $request = array(
                'entrada' => date('G:i:s'),
                'data' => date('d-m-y'),
                'func_id' => $id
                );

        RegistrarPonto::findOrFail($id)->update($request->all());
        return redirect('admin/marcar_ponto')->with('mensagem', 'Datos atualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    //$verif_id = RegistrarPonto::where('func_id', $id)->get();
        // $status = "presente";
        //     if(count($verif_id) == 0){
        //         $request = array(
        //         'entrada' => date('G:i:s'),
        //         'data' => date('Y-m-d'),
        //         'func_id' => $id,
        //         'status' => $status,
        //         'saida_a' => "12:00",
        //         'entrada_a' => "13:00",
        //         'saida' => "17:00"
        //         );
        //         RegistrarPonto::create($request);
        //         return redirect('marcar.ponto');
        //     }else{
        //     }
}
