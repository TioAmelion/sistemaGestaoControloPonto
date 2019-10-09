@extends("$tema.layout")

@section('conteudo')
<center>

          
<div class="col-md-9">
    <div id="" class="col-xs-10 col-xs-offset-3">
    <div class="modal-dialog">
      <div class="modal-content">
        @foreach($errors as $error)
          <span>{{$error}}</span>
        @endforeach
        <form role="form" enctype="multipart/form-data" action="{{route('atualizar_faltas', ['id' => $dados->id])}}" method="POST">
              @csrf @method("put")
          <div class="modal-header">            
            <h4 class="modal-title">Adicionar Jusfificativo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <div class="form-group">
              <input type="text" placeholder="Digite o motivo da falta" value="" name="justificar" class="form-control" >
              <input type="hidden"  value="justificada" name="falta" class="form-control" >
            </div>
            <div class="form-group">
              <input type="file" class="form-control" name="imagem">
            </div>
            
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-success" value="Add">
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
           
  </center>   
@endsection