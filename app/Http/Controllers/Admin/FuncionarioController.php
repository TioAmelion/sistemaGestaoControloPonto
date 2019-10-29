<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Funcionario;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class FuncionarioController extends Controller
{
    //use AuthenticatesUsers;

    //protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
         $validator = Validator::make($request->all(),

         [
            'nome'              =>  'required',
            'num_bi'            =>  'required', 
            'imagem'            =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'local_trabalho'    =>  'required',
            'departamento'      =>  'required',
            'faixa_salarial'    =>  'required|numeric|between:0,99.99',
            'funcao'            =>  'required',
            'genero'            =>  'required',
            'telefone'          =>  'required',
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

        // $requestt = array(
        //     'nome'       =>   $request->nome,
        //     'num_bi'        =>   $request->num_bi,
        //     'imagem'            =>   $new_name,
        //     'local_trabalho'            =>  $request->local_trabalho,
        //     'departamento'            =>   $request->departamento,
        //     'faixa_salarial'            =>   $request->faixa_salarial,
        //     'funcao'            =>   $request->funcao,
        //     'genero'            =>   $request->genero,
        //     'telefone'            =>   $request->telefone
        // );

    //     dd($requestt);
         Funcionario::create($request->all());
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
