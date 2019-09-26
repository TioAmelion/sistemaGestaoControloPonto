@extends("$tema.layout")

@section('conteudo')
<center>

          
<div class="col-md-9">
    <div id="" class="col-xs-10 col-xs-offset-3">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" action="{{route('atualizar_faltas', ['id' => $dados->id])}}" method="POST">
              @csrf @method("put")
          <div class="modal-header">            
            <h4 class="modal-title">Adicionar Jusfificatifo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <div class="form-group">
              <input type="text" placeholder="Digite o motivo da falta" value="" name="justificar" class="form-control" required>
            </div>
            <div class="form-group">
              <!--label>Email</label-->
              <input type="file" class="form-control" required>
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