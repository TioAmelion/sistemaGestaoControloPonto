<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Laravel 5.8 Ajax Crud Tutorial - Delete or Remove Data</h3>
     <br />
     <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl">Adicionar</button>
      
     </div>
     <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
                <th width="10%">Imagem</th>
                <th width="35%">Nome completo</th>
                <th width="35%">Funcão</th>
                <th width="30%">Action</th>
            </tr>
           </thead>
       </table>
   </div>
   <br />
   <br />
  </div>

  <div id="formModal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl" style="width: 1200px">
    <div style="background-color: white">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Funcionario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <br>
      <span id="form_result"></span>
    <form role="form" action="" method="POST" id="sample_form">
              @csrf
          <div class="card-body" >
            <div class="row">
              <div class="col-md-6" >
                <div class="form-group" style="width: 500px; margin-left: 30px; ">
                  <label for="exampleInputEmail1"></label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome completo">
                </div>
                <!-- /.form-group -->
                <div class="form-group" style="width: 500px; margin-left: 30px">
                  <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="num_bi" placeholder="Numero de B.I">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group" style="width: 500px; margin-left: 15px">
                  <label for="exampleFormControlSelect1"></label>
              <select class="form-control" name="genero">
                <option >Selecione o genero</option>
                  <option value="M">M</option>
                  <option value="F">F</osption>
              </select>
                </div>
                <div class="form-group" style="width: 500px; margin-left: 15px">
                  <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="telefone" placeholder="Numero de telefone">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group" style="width: 500px; margin-left: 30px">
                  <label for="exampleFormControlSelect1"></label>
              <select class="form-control" name="departamento">
                <option>Selecione o departamento</option>
                  <option value="Gestão da informação">Gestão da informação</option>
              </select>
                </div>
                <div class="form-group" style="width: 500px; margin-left: 30px">
                  <label for="exampleFormControlSelect1"></label>
              <select class="form-control" name="funcao">
                <option>Selecione a funcão</option>
                <option value="Técnico gestão documental">Técnico gestão documental</option>
                  <option value="Assistente técnico gestão documental">Assistente técnico gestão documental</option>
              </select>
                </div>
              </div>
              <div class="col-md-6" >
                <div class="form-group" style="width: 500px; margin-left: 15px">
                 <label for="exampleFormControlSelect1"></label>
              <select class="form-control" name="local_trabalho">
                <option>Selecione o local de trabalho</option>
                  <option value="Acervo Benfica">Acervo Benfica</option>
                  <option value="Acerco Talatona">Acerco Talatona</option>
              </select>
                </div>
                <div class="form-group" style="width: 300px; margin-left: 15px">
                 <label for="exampleInputPassword1"></label>
                    <input type="text" class="form-control" name="faixa_salarial" placeholder="salario">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group" style="width: 500px; margin-left: 30px">
                  <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imagem">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                </div>
                <div class="form-group" style="width: 500px; margin-left: 15px">

                <input type="hidden" name="action" id="action" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
                <button type="submit" id="action_button" class="btn btn-primary">Enviar</button>
              </div>
              <br>
              <br>
           </div>
       </div>
    </form>
    </div>
    </div>
  </div>
</div>
 </body>
 <script type="text/javascript">
$(document).ready(function(){

 $('#user_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('func.index') }}",
  },
  columns:[
   {
    data: 'imagem',
    name: 'imagem',
    render: function(data, type, full, meta){
     return "<img src={{asset("assests/$tema/dist/img")}}/" + data + " width='70' class='img-thumbnail' />";
    },
    orderable: false
   },
   {
    data: 'nome',
    name: 'nome'
   },
   {
    data: 'telefone',
    name: 'telefone'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 })

  $('#create_record').click(function(){
  //$('.modal-title').text("Add New Record");
     //$('#action_button').val("Add");
     $('#action').val("Enviar");
     //$('#formModal').modal('show');
 });

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Enviar')
  {
   $.ajax({
    url:"{{ route('func.store') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#user_table').DataTable().ajax.reload();
     }
     $('#form_result').html(html);
    }
   });
  }
});
});
 </script>
</html>