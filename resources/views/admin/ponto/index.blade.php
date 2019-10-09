@extends("$tema.layout")

@section('conteudo')
<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
						<h2>Marcar <b>Ponto <span class="text-warning" id="demo"></span></b></h2>
					</div>
					<div class="col-sm-7">
						<a href="#" class="btn btn-primary"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="font-size:16px">Nome</th>
                        <th style="font-size:16px; right: 100px">Local de trabalho</th>
						<th style="font-size:16px">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dados as $d)
                    <tr>
                        <td style="font-size:16px">{{$d->id}}</td>
                        <td><a href="#"><img src='{{asset("assests/$tema/dist/img/".$d->imagem)}}' class="avatar" alt="Avatar" style="width: 70px; height: 70px">{{$d->nome}}</a></td>
						<td>{{$d->local_trabalho}}</td>
						<td>
							<a href="{{route('salvar.ponto', $d->id)}}" class="btn btn-block  text-white btn-primary view-data">
								<i class="far fa-clock"></i>Marcar Ponto
							</a>
                            <a href="{{route('marcar_falta', $d->id)}}" class="btn btn-block  text-white btn-danger view-data">
                                <i class="far fa-user"></i>Marcar Falta
                            </a>
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


	

        </div>
    </div> 
    <script type="text/javascript">
        var myVar = setInterval(myTimer ,1000);
        function myTimer() {
            var d = new Date(), displayDate;
           if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
              displayDate = d.toLocaleTimeString('pt-BR');
           } else {
              displayDate = d.toLocaleTimeString('pt-BR', {timeZone: 'Africa/luanda'});
           }
              document.getElementById("demo").innerHTML = displayDate;
        }
    </script>
@endsection

