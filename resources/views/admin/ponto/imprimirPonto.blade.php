HELLO
@foreach($dados as $dados)
{{$dados->Numero_funcionario}}
{{$dados->Empresa}}
<a href="{{route('export_individual', $d->id)}}" class="btn btn-block  text-white btn-primary view-data">
								<i class="fas fa-print"></i>Imprimir Ponto
							</a>
@endforeach