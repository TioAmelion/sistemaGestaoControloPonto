@extends("$tema.layout")

@section('conteudo')
<center>
      <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <section class="content">
      <div class="container-fluid" >
        
            <h3 class="card-title">Editar Usuario</h3>
            <div class="card-tools">
              <button type="button" class=" btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <form role="form" action="{{route('usuarios_update', ['id' => $dados->id])}}" method="POST">
          		@csrf @method("put")
          <div class="card-body" >
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                    <input type="text" class="form-control" name="name" placeholder="Nome completo" value="{{$dados->name}}">
                </div>
                <!-- /.form-group >
                <div class="form-group">
                  <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="role" placeholder="adicione uma permissão"  value="{{$dados->role}}">
                </div>-->
                <select class="form-control" name="role">
                <option>Selecione uma permissão</option>
                  <option value="super_admin">Super Administrador</option>
                  <option value="admin">Administrador</option>
                  <option value="supervisor_benfica">Supervisor Benfica</option>
                  <option value="supervisor_talatona">Supervisor Talatona</option>
              </select>
              </div>
              <div class="col-md-1">
              	<div class="form-group">
              		<div class="custom-file">
                  </div>
              	</div>
              	<div class="form-group">
            		<button type="submit" class="btn btn-primary">Enviar</button>
            	</div>
        	 </div>
       </div>
    </form>
           
  </center>   
@endsection