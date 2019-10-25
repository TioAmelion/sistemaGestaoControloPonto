@extends("$tema.layout")

@section('conteudo')
<br><br>
<div class="col-xs-10 col-xs-offset-1">
    <div class="card col-xs-6" style="right: 10px">
                  <div class="card-header">
                    <h3 class="mb-0">Funcionarios Benfica</h3>

                    <div class="card-tools">
                      @foreach($numero1 as $num)
                      <span class="p-3 m-1 badge bg-danger">{{$num->numero}} presente</span>
                      @endforeach
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach($dados as $d)
                      <li>
                        <img src='{{asset("assests/$tema/dist/img/".$d->imagem)}}' alt="User Image">
                        <a class="p-3 m-1" href="#">{{$d->nome}}</a>
                        <span class="users-list-date">{{$d->data}}</span>
                        
                      </li>
                      @endforeach
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="javascript::">Ver mais</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
                <div class="card col-xs-6">
                  <div class="card-header">
                    <h3 class="mb-0">Funcionarios Talatona</h3>

                    <div class="card-tools">
                      @foreach($numero as $n)
                      <span class="p-3 m-1 badge bg-danger">{{$n->numero}} presente</span>
                      @endforeach
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach($var as $v)
                      <li>
                        <img src='{{asset("assests/$tema/dist/img/".$v->imagem)}}' alt="User Image">
                        <a class="p-3 m-1 " href="#">{{$v->nome}}</a>
                        <span class="users-list-date">{{$v->data}}</span>
                      </li>
                      @endforeach
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="javascript::">Ver mais</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
</div>

@endsection