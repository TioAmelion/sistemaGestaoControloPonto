@extends("$tema.layout")

@section('conteudo')
<div class="col-md-12 ">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                 <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Gerenciar<b> funcionários</b></h2>
					</div>

          @can('super_admin')
					<div class="col-sm-6">
						<a href="#addEmployeeModal" data-toggle="modal" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add funcionario</span></a>					
					</div>

          @elsecan('admin')
          <div class="col-sm-6">
            <a href="#addEmployeeModal" data-toggle="modal" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add funcionario</span></a>          
          </div>

          @else('')
          <div class="col-sm-6">
            <a href="#" data-toggle="modal" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Sem permissão</span></a>          
          </div>
          @endcan

                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Nome</th>
						          <th>Função</th>
                        <th>Telefone</th>
                        <th>Acções</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($dados as $d)
                    <tr>

						
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td>{{$d->nome}}</td>
						            <td>{{$d->funcao}}</td>
                        <td>(+244) {{$d->telefone}}</td>
                        @can('super_admin')
                        <td>
                        	<a class="btn btn-primary text-white float-left" href="{{route('editar_func',$d->id)}}" role="button">Editar</a><br><br>
                        	<form action="{{route('eliminar_func', ['id' => $d->id])}}" method="POST">
            							@csrf @method("delete")
            							<button class="btn btn-danger float-rigth" type="submit">Apagar</button>
            							</form>
            						</td>
                        @elsecan('admin')
                        <td>
                         <a class="btn btn-primary text-white float-left" href="{{route('editar_func',$d->id)}}" role="button">Editar</a><br><br>
                        </td>
                        @else('')
                        <td>
                          <a class="btn btn-primary text-white float-left" href="#" role="button">Sem permissão</a>
                        </td>
                        @endcan
                    </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form role="form" enctype="multipart/form-data" action="{{route('salvar_func')}}" method="POST">
          		@csrf
					<div class="modal-header">						
						<h4 class="modal-title">Add Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="card-body" >
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome completo" required>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="num_bi" placeholder="Numero de B.I" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="genero">
					    	<option >Selecione o genero</option>
					        <option value="M">M</option>
					        <option value="F">F</option>
					    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="telefone" placeholder="Numero de telefone" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="departamento">
					    	<option>Selecione o departamento</option>
					        <option value="Gestão da informação">Gestão da informação</option>
					    </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="funcao" >
					    	<option>Selecione a funcão</option>
					    	<option value="Técnico Gestão Documental">Técnico de Gestão Documental</option>
					      	<option value="Assistente Técnico Gestão Documental">Assistente Técnico Gestão Documental</option>
                  <option value="Assistente de Gestão Documental">Assistente de Gestão Documental</option>
                  <option value="Supervisor de Gestão Documental">Supervisor de Gestão Documental</option>
                  <option value="Assistente Analista de Suporte 1">Assistente Analista de Suporte 1</option>
					    </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                 <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="local_trabalho">
					    	<option>Selecione o local de trabalho</option>
					        <option value="Acervo Benfica">Acervo Benfica</option>
					        <option value="Acerco Talatona">Acervo Talatona</option>
					    </select>
                </div>
                <!--div class="form-group">
                 <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="faixa_salarial" placeholder="salario" required>
                </div-->
              </div>
              <div class="col-md-6">
              	<div class="form-group">
              		<div class="custom-file">
                        <input type="file" class="custom-file-input" name="imagem" >
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
              	</div>
              	<!--div class="form-group">
            		<button type="submit" class="btn btn-primary">Enviar</button>
            	</div-->
        	 </div>
       </div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				
    </form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form role="form" enctype="multipart/form-data" action="{{route('salvar_func')}}" method="POST">
          		@csrf
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome completo">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="num_bi" placeholder="Numero de B.I">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="genero">
					    	<option >Selecione o genero</option>
					        <option value="M">M</option>
					        <option value="F">F</option>
					    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="telefone" placeholder="Numero de telefone">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="departamento">
					    	<option>Selecione o departamento</option>
					        <option value="Gestão da informação">Gestão da informação</option>
					    </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="funcao">
					    	<option>Selecione a funcão</option>
					    	<option value="Técnico gestão documental">Técnico gestão documental</option>
					      	<option value="Assistente técnico gestão documental">Assistente técnico gestão documental</option>
					    </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                 <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="local_trabalho">
					    	<option>Selecione o local de trabalho</option>
					        <option value="Acervo Benfica">Acervo Benfica</option>
					        <option value="Acerco Talatona">Acerco Talatona</option>
					    </select>
                </div>
                <div class="form-group">
                 <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="faixa_salarial" placeholder="salario">
                </div>
              </div>
              <div class="col-md-6">
              	<div class="form-group">
              		<div class="custom-file">
                        <input type="file" class="custom-file-input" name="imagem">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
              	</div>
              	<!--div class="form-group">
            		<button type="submit" class="btn btn-primary">Enviar</button>
            	</div-->
        	 </div>
       </div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
               </div>
            </div>
</div>

@endsection

