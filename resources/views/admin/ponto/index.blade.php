@extends("$tema.layout")

@section('conteudo')
<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
						<h2>Marcar <b>Ponto</b></h2>
					</div>
					<div class="col-sm-7">
						<a href="#" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
						<a href="#" class="btn btn-primary"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="font-size:16px">Nome</th>						
						<th style="font-size:16px">Data</th>
						<th style="font-size:16px">Função</th>
                        <th style="font-size:16px">Status</th>
						<th style="font-size:16px">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dados as $d)
                    <tr>
                        <td style="font-size:16px">{{$d->id}}</td>
                        <td><a href="#"><img src='{{asset("assests/$tema/dist/img/user2-160x16.jpg")}}' class="avatar" alt="Avatar">{{$d->nome}}</a></td>
                        <td style="font-size:16px">{{$d->data}}</td>                        
                        <td style="font-size:16px">{{$d->função}}</td>
						<td style="font-size:16px"><span class="status text-success">&bull;</span>Active</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="far fa-clock"></i></a>
							<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="fas fa-user-times" style="width:20px"></i></a>
						</td>
						
                    </tr>
                    @endforeach
                </tbody>
            </table>
			<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>

        <div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="POST">
					@csrf
					<div class="modal-header">						
						<h4 class="modal-title">Marcar Ponto|Nome Funcionario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<label>Data</label>
							<input type="text" class="form-control" name="data" value="sdsd" disabled="false">
						</div>					
						<div class="form-group">
							<label>Entrada</label>
							<input type="time" class="form-control" name="entrada" required>
						</div>
						<div class="form-group">
							<label>Saída Almoço</label>
							<input type="time" class="form-control" name="saida_a" required>
						</div>
						<div class="form-group">
							<label>Entrada Almoço</label>
							<input type="time" class="form-control" name="entrada_a" required>
						</div>
						<div class="form-group">
							<label>Saída</label>
							<input type="time" class="form-control" name="saida" required>
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

        </div>
    </div> 
@endsection

