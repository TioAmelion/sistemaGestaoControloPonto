@extends("$tema.layout")

@section('conteudo')
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rol</h3>

                <div class="card-tools">
                 
                </div>
              </div>
              <!-- /.card-header -->
               
                <table class="table">
                  <thead>
                    <tr>
                      <th>Menu</th>
                      @foreach($rols as $id => $nome)
                      <th>{{$nome}}</th>
                        @endforeach
                    </tr>
                  </thead>
                   @foreach($menus as $key => $menu)
                    @if($menu["menu_id"] != 0)
                        @break
                        @endif
                  <tr>
                   
                    <td>{{$menu["url"]}}</td>
                     @foreach($rols as $id => $nombre)
                                    <td class="text center">
                                        <input type="checkbox" value="{{$menu['id']}}">
                                    </td>
                                @endforeach
                     @endforeach
                      </tr>
                </table>
            </div>
          
          </div>

@endsection