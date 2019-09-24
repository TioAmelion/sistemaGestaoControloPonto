<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Funcionario;
use App\Models\Admin\RegistrarPonto;

class RegistrarPontoController extends Controller
{
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
        $dado = funcionario::where('local_trabalho', 'Acerco Talatona')->get();
        return view('admin.ponto.talatona', compact('dado'));
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
        // Marcar ponto hora de entrada
        //$verif_id = \DB::table('registro')->where('func_id', $id)->get();
        $pegar = $id;
        $verif_id = RegistrarPonto::where('func_id', $id)->get();
        //dd($verif_id);
        //foreach ($verif_id as $data) {
            if(count($verif_id) == 0){
                $request = array(
                'entrada' => date('G:i:s'),
                'data' => date('d-m-y'),
                'func_id' => $id
                );
                RegistrarPonto::create($request);
                return redirect('admin/marcar_ponto');
            }else{
            }
            
        //}
               /* $saida_a = date('G');
                if($saida_a == 14){
                    $request = array(
                    'saida_a' => date('G:i:s'),
                    'data' => date('d-m-y'),
                    'func_id' => $id
                    );
                    RegistrarPonto::create($request);
                    return redirect('admin/marcar_ponto');
                    }
              }

          }else{

            $request = array(
            'entrada' => date('G:i:s'),
            'data' => date('d-m-y'),
            'func_id' => $id
            );
            RegistrarPonto::create($request);
            return redirect('admin/marcar_ponto');
            //dd($verif_id);

        }
*/
        
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$dados = funcionario::find($id);
        // return view('admin.ponto.index')->with('dados', $dados);
        //return $dados->id;
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
        //
    }
}
