
<!DOCTYPE html>
<html>
<head>
    @include("$tema/header")
	<title>calendario</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
</head>
<body>
    @include("$tema/navbar")
    @include("$tema/menu")

	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading "><a href="#addEmployeeModal" data-toggle="modal" class="btn btn-primary nav-link active" role="button">Add Férias</a>
                    <a href="#Feriados" data-toggle="modal" class="btn btn-primary nav-link active" role="button">Ver feriados</a>
                    <a href="{{route('inicio')}}" class="btn btn-primary nav-link active" role="button">Voltar</a>
                </div>

                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="{{route('add_events')}}" method="POST">
            @csrf
                <div class="modal-header">                      
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="card-body" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="nome" required>
                            </div>
                            <div class="form-group">
                                <label>Data Fim</label>
                                <input type="date" class="form-control" name="end_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                             <label>Data Inicio</label>
                             <input type="date" class="form-control" name="start_date" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
            </div>
        </div>
</div>

<div id="Feriados" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <table class="table nav-link active">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">Data</th>
                      <th scope="col">Feriado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>1 de janeiro</td>
                      <td>Ano Novo</td>
                    </tr>
                    <tr>
                      <td>4 de fevereiro</td>
                      <td>Dia Nacional do Esforço Armado</td>
                    </tr>
                    <tr>
                      <td>25 de fevereiro</td>
                      <td>Carnaval</td>
                    </tr>
                    <tr>
                      <td>8 de março</td>
                      <td>Dia Internacional da Mulher</td>
                    </tr>
                    <tr>
                      <td>9 de março</td>
                      <td> Feriado do Dia Internacional da Mulher</td>
                    </tr>
                    <tr>
                      <td>23 de março</td>
                      <td>Dia da Batalha do Cuito Cuanavale</td>
                    </tr>
                    <tr>
                      <td>4 de abril</td>
                      <td>Dia da Paz</td>
                    </tr>
                    <tr>
                      <td>10 de abril</td>
                      <td>Sexta-Feira Santa</td>
                    </tr>
                    <tr>
                      <td>1 de maio</td>
                      <td>Dia do Trabalhador</td>
                    </tr>
                    <tr>
                      <td>17 de setembro</td>
                      <td>Dia dos Heróis Nacionais</td>
                    </tr>
                    <tr>
                      <td>2 de novembro</td>
                      <td>Dia de Finados</td>
                    </tr>
                    <tr>
                      <td>11 de novembro</td>
                      <td>Dia da Independência</td>
                    </tr>
                    <tr>
                      <td>25 de dezembro</td>
                      <td>Natal</td>
                    </tr>
                </tbody>
            </table>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

</html>

