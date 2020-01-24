@extends("$tema.layout")

@section('conteudo')
<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
            <h2>Codigo Qr <b>Funcionarios <span class="text-warning" id="demo"></span></b><span onclick="cont()">Imprimir</span></h2>
          </div>
                </div>
            </div>
            <div id="print" class="conteudo">
            <table class="table table-striped table-hover" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="font-size:16px;">Nome</th>
                        <th style="font-size:16px">Codigo Qr</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dados as $d)
                    <tr>
                        <td style="font-size:16px">{{$d->id}}</td>
                        <td><a href="#"><img src="{{ URL::to('/') }}/images/{{ $d->imagem}}" class="avatar" alt="Avatar" style="width: 70px; height: 70px">{{$d->nome}}</a></td>
                        <td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(300)->generate($d->id)); !!} ">
       <br></td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>

<script>
function cont(){
   var conteudo = document.getElementById('print').innerHTML;
   tela_impressao = window.open('about:blank');
   tela_impressao.document.write(conteudo);
   tela_impressao.window.print();
   tela_impressao.window.close();
}
</script>
    <script type="text/javascript">
        function myFunction() {
          window.print();
        }
    </script>
@endsection

