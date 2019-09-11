@extends("$tema.layout")

@section('conteudo')
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

   @if (session("mensagem"))
    <div class="alert alert-sucess alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hiden="true"></button>
        <h4><i class="icon fa fa-check"></i>Mensagem de sistema de biblioteca</h4>
        <ul>
          <li>{{ session("mensagem") }}</li>
        </ul>
    </div>
@endif
              <div class="card-header">
                <h3 class="card-title">Editar Rol</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('atualizar_rol', ['id' => $dados->id] )}}" method="POST">
                 @csrf @method("put")
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nome" name="nome" placeholder="nome do menu" value="{{old('nome', $dados->nome ?? '' )}}">
                    </div>
                  </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Salvar</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            </div>
            </div>
          </div>
@endsection
 