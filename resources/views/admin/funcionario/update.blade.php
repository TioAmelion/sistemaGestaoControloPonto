@extends("$tema.layout")

@section('conteudo')
<center>
<!--div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Cadastrar Funcionario</h3>
                <div class="card-body">
          	<form role="form" action="" method="POST">
          		@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome completo">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="num_bi" placeholder="Numero de B.I">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="genero">
					      <option>M</option>
					      <option>F</option>
					    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="telefone" placeholder="Numero de telefone">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="area">
					      <option>Gestão da informação</option>
					    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="funcao">
					      <option>Assistente técnico</option>
					    </select>
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="local">
					      <option>Acervo Benfica</option>
					      <option>Acerco Talatona</option>
					    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile"></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="salario" placeholder="salario">
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
          </div>
      </div-->
      <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <section class="content">
      <div class="container-fluid" >
        
            <h3 class="card-title">Editar funcionario</h3>
            <div class="card-tools">
              <button type="button" class=" btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <form role="form" action="{{route('atualizar_fuc', ['id' => $dados->id])}}" method="POST">
          		@csrf @method("put")
          <div class="card-body" >
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome completo" value="{{$dados->nome}}">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="num_bi" placeholder="Numero de B.I"  value="{{$dados->num_bi}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="genero" value="{{$dados->genero}}">
					    	<option >Selecione o genero</option>
					        <option value="M">M</option>
					        <option value="F">F</option>
					    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="telefone" placeholder="Numero de telefone" value="{{$dados->telefone}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="departamento" value="{{$dados->departamento}}">
					    	<option>Selecione o departamento</option>
					        <option value="Gestão da informação">Gestão da informação</option>
					    </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="funcao" value="{{$dados->funcao}}">
					    	<option>Selecione a funcão</option>
					    	<option value="Técnico gestão documental">Técnico gestão documental</option>
					      	<option value="Assistente técnico gestão documental">Assistente técnico gestão documental</option>
					    </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                 <label for="exampleFormControlSelect1"></label>
					    <select class="form-control" name="local_trabalho" value="{{$dados->local_trabalho}}">
					    	<option>Selecione o local de trabalho</option>
					        <option value="Acervo Benfica">Acervo Benfica</option>
					        <option value="Acerco Talatona">Acervo Talatona</option>
					    </select>
                </div>
                <div class="form-group">
                 <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="faixa_salarial" placeholder="salario" value="{{$dados->faixa_salarial}}">
                </div>
              </div>
              <div class="col-md-6">
              	<div class="form-group">
              		<div class="custom-file">
                        <input type="file" class="custom-file-input" name="imagem">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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