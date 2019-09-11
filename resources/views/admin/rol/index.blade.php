@extends("$tema.layout")

@section('conteudo')
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rol</h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Nome</th>
                    </tr>
                  </thead>
                  	@foreach($dados as $p)
                  	<tr>
                      <td>{{$p->id}}</td>
                      <td>{{$p->nome}}</td>
                      <td>
                      	<a href="{{route('editar_rol', $p->id)}}">editar</a>
                      	<form action="{{route('eliminar_rol', ['id'  => $p->id] )}}" method="POST" > @csrf @method("delete")
                      		<button type="submit">excluir</button>
                      	</form>
                      </td>
                      </tr>
                  @endforeach
                </table>
            </div>
          </div>
@endsection