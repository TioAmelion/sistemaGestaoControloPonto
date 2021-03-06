@extends("$tema.layout")

@section('conteudo')
<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
						<h2>Justificar Faltas</h2>
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
                        <th style="font-size:16px; right: 100px">Role</th>
                        <th style="font-size:16px">Acção</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dados as $d)
                    <tr>
                        <td style="font-size:16px">{{$d->id}}</td>
                        <td><a href="#"><img src='{{asset("assests/$tema/dist/img/".$d->imagem)}}' class="avatar" alt="Avatar" style="width: 70px; height: 70px">{{$d->name}}</a></td>
						<td>{{$d->role}}</td>
						<td>
							<a href="{{route('usuarios_edit', $d->id)}}" class="btn btn-block  text-white btn-primary view-data">
                                Editar permissão
							</a>
						</td>
						
                    </tr>
                    @endforeach
                </tbody>
            </table>


	

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

