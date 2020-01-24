 <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="font-size:16px">{{ @date('Y-m-d') }} Relatorio de Assiduidade, Interdigitos, LDA</th>
                    </tr>
                    <tr>
                        <th>  </th>
                    </tr>
                    <tr>
                        <th >Empresa</th>
                        <th style="font-size:13px; width: 18px">Nº Funcionario</th>
						<th style="font-size:13px; width: 18px">Nome</th>
                        <th style="font-size:13px; width: 18px">Data</th>
                        <th style="font-size:13px; width: 18px">Entrada</th>
                        <th style="font-size:13px; width: 18px">Saída H/A</th>
                        <th style="font-size:13px; width: 18px">Regresso H/A</th>
                        <th style="font-size:13px; width: 18px">Saida</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dados as $d)
                    <tr>
                        <td style="font-size:13px; width: 18px">{{$d->empresa}}</td>
                        <td style="font-size:13px; width: 18px">{{$d->func_id}}</td>
                        <td style="font-size:13px; width: 18px">{{$d->nome}}</td>
                        <td style="font-size:13px; width: 18px">{{$d->data}}</td>
                        <td style="font-size:13px; width: 18px">{{$d->entrada}}</td>
						<td style="font-size:13px; width: 18px">{{$d->saida_a}}</td>
                        <td style="font-size:13px; width: 18px">{{$d->entrada_a}}</td>
                        <td style="font-size:13px; width: 18px">{{$d->saida}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>