@extends("$tema.layout")

@section('conteudo')
<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
						<h2>Imprimir registro<b> Mensal</b></h2>
					</div>
                    @can('super_admin')
					<div class="col-sm-7">
						<a href="{{route('export')}}" class="btn btn-primary"><i class="material-icons">&#xE24D;</i> <span>Exportar Para Excel</span></a>						
					</div>
                    @else
                    <div class="col-sm-7">
                        <a href="#" class="btn btn-primary"><i class="material-icons">&#xE24D;</i> <span>Sem Permissão para imprimir</span></a>                       
                    </div>
                    @endcan
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="font-size:16px">Nome</th>
                        <th style="font-size:16px; right: 100px">Nº Presenças</th>
                         <th style="font-size:16px; right: 100px">Nº Faltas</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dados as $d)
                    <tr>
                        <td style="font-size:16px">{{$d->id}}</td>
                        <td><a href="#"><img src='{{asset("assests/$tema/dist/img/".$d->imagem)}}' class="avatar" alt="Avatar" style="width: 70px; height: 70px">{{$d->nome}}</a></td>
						<td>{{$d->presencas}}</td>
                        <td>{{$d->ausencias}}</td>
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
@endsection

