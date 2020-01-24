<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Funcionario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use App\Providers\AuthServiceProvider;

class FuncionarioController extends Controller
{
    public function index()
    {
        $dados = Funcionario::orderBy('nome', 'asc')->get();
        return view('admin.funcionario.index', compact('dados'));
    }

    public function imprimir_qrCode(){
        $dados = Funcionario::all();
        return view('Admin.funcionario.qrCode', compact('dados', $dados));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('imagem');
         $validator = Validator::make($request->all(),

        [
            'nome'              =>  'required',
            //'num_bi'            =>  'required', 
            //'imagem'            =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'local_trabalho'    =>  'required',
            //'departamento'      =>  'required',
            //'faixa_salarial'    =>  'required|numeric|between:0,99.99',
            'funcao'            =>  'required',
            //'genero'            =>  'required',
            //'telefone'          =>  'required',
        ]
    );
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        //$image = $request->file('imagem');
        //$new_name = rand() . '.' . $image->getClientOriginalExtension();
        //$image->move(public_path('images'), $new_name);

        $request = array(
            'nome'       =>   $request->nome,
            //'num_bi'        =>   $request->num_bi,
            //'imagem'            =>   $new_name,
            //'local_trabalho'            =>  $request->local_trabalho,
            'departamento'            =>   $request->departamento,
            //'faixa_salarial'            =>   $request->faixa_salarial,
            'funcao'            =>   $request->funcao,
            //'genero'            =>   $request->genero,
            //'telefone'            =>   $request->telefone
        );

        Funcionario::create($request);
        return redirect('funcionario')->with('mensagem', 'Funcionario salvo com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = funcionario::find($id);
        return view('admin.funcionario.update', compact('dados'));
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
        funcionario::findOrFail($id)->update($request->all());
        return redirect('funcionario')->with('mensagem', 'Datos atualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(funcionario::destroy($id)){
            return redirect('funcionario');
        }else{
            abort(404);
        }
    }
}
