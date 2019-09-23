<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Funcionario;
use Validator;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Funcionario::all();
        return view('admin.funcionario.index', compact('dados'));

        /*if(request()->ajax())
        {
            return datatables()->of(Funcionario::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.funcionario.index');*/
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
        Funcionario::create($request->all());
        return redirect('admin/func')->with('mensagem', 'Funcionario salvo com sucesso');

        /*$rules = array(
            'nome'    =>  'required',
            'telefone'     =>  'required',
            //'imagem'         =>  'required|image|max:2048',
            'faixa_salarial'     =>  'required',
            'departamento'     =>  'required',
            'genero'     =>  'required',
            'funcao'     =>  'required',
            'local_trabalho'     =>  'required',
            'num_bi'     =>  'required'
        );*/

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        //$image = $request->file('imagem');

        //$new_name = rand() . '.' . $image->getClientOriginalExtension();

        //$image->move(public_path('assests/AdminLTE/dist/img'), $new_name);

        $form_data = array(
            'nome'        =>  $request->nome,
            'telefone'         =>  $request->telefone,
            'imagem'             =>  $request->imagem,
            'faixa_salarial' => $request->faixa_salarial,
            'departamento' => $request->departamento,
            'genero' => $request->funcao,
            'funcao' => $request->local_trabalho,
            'num_bi' => $request->num_bi,
            'local_trabalho' => $request->local_trabalho
        );

        funcionario::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
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
        //$dados = Rol::findOrFail($id); |se o id não existe mostra a pagina de erro 404
        $dados = funcionario::find($id); // |se o id existe mostra null
        //dd($dados);
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
        return redirect('admin/func')->with('mensagem', 'Datos atualizados');
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
            return redirect('admin/func');
        }else{
            abort(404);
        }
    }
}
