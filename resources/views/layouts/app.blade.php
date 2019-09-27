@extends("$tema.layout")

@section('conteudo')
<br><br>
<div class="col-xs-10 col-xs-offset-1">
        <div class="card col-xs-6" style="right: 10px">
                  <div class="card-header">
                    <h3 class="mb-0">Funcionarios Benfica</h3>

                    <div class="card-tools">
                      <span class="p-3 m-1 badge bg-danger">0 presentes</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                        
                      <li>
                        <img src='' alt="User Image">
                        <a class="p-3 m-1" href="#"></a>
                        <span class="users-list-date"></span>
                      </li>
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
                      <span class="p-3 m-1 badge bg-danger">0 presentes</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      <li>
                        <img src='' alt="User Image">
                        <a class="p-3 m-1 " href="#"></a>
                        <span class="users-list-date"></span>
                      </li>
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
              <!-- /.col -->
            

@endsection