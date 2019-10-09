<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\faltas;

class JustificarFaltasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = \DB::select('SELECT f.id, r.nome, f.data, f.imagem FROM falta f, funcionario r WHERE f.func_id=r.id AND data BETWEEN "2019-10-01" AND "2019-10-30" ');
        return view('admin.funcionario.faltas', compact('dados', $dados));
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
    public function store(Request $request)
    {
        //
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
        $dados = faltas::findOrFail($id);
        return view('Admin.funcionario.justificar', compact('dados', $dados));
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
        $image = $request->file('imagem');
        $validator = Validator::make($request->all(),
            [
                'justificar' =>  'required',
                'falta' =>  'required',
                'imagem'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             ]
        );

        if ($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
   
        $image = $request->file('imagem');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $form_data = array(
            'justificar' =>$request->justificar,
            'imagem' => $new_name
        );

         faltas::findOrFail($id)->update($form_data);
         return redirect('faltas')->with('mensagem', 'Dados atualizados');
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
