<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Funcionario;
use App\Models\Admin\RegistrarPonto;
use App\Models\Admin\Faltas;

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
    public function store($id)
    {
        $verif_id = RegistrarPonto::where('func_id', $id)->get();
        $status = "presente";
            if(count($verif_id) == 0){
                $request = array(
                'entrada' => date('G:i:s'),
                'data' => date('Y-m-d'),
                'func_id' => $id,
                'status' => $status,
                'saida_a' => "12:00",
                'entrada_a' => "13:00",
                'saida' => "17:00"
                );
                RegistrarPonto::create($request);
                return redirect('admin/marcar_ponto');
            }else{
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

        return redirect('admin/marcar_ponto');
            
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
         //dd($request);
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
}
