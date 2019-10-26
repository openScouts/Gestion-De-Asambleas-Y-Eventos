<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestion De Acreditaciones Scouts</title>
        <link type="text/css" rel="stylesheet" href="{{ url('css/mdb.css') }}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{ url('css/bootstrap.css') }}"  media="screen,projection"/>
        <meta http-equiv="refresh" content="20" >
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark blue">
            <a class="navbar-brand" href="#">OpenScouts</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                            <a href="{{ url('/nomina') }}" class="nav-link">Admin</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="pt-3">
            <div class="container-fluid">
                <div class="row">
                    @if($oradores->count())
                        <div class="col-6">
                    @else
                        <div class="col-12">
                    @endif

                         <div class="card text-white bg-primary mb-3" >
                            <div class="card-body  center-align" style="text-align: center;" >
                                <h4 class="card-title center-align">Quorum</h4>
                                <h1 class="display-1 center-align"  style="font-size: 8em;">{{ $quorum }}</h1>
                            </div>
                        </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">Acreditados
                          <span class="badge badge-success badge-pill" style="font-size: 2em;"> {{ $acreditados }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Padron Asambleario
                            <span class="badge badge-primary badge-pill" style="font-size: 2em;"> {{ $totalPadron }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Acreditados Ausentes
                            <span class="badge badge-warning badge-pill" style="font-size: 2em;"> {{ $acreditadosAusentes }}</span>
                        </li>
                    </ul>

                    </div>
                    @if($oradores->count())
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Oradores: {{ $oradores->count() }}</h5>
                                    <ul class="list-group list-group-flush">
                                        @foreach($oradores as $var )
                                            <li class="list-group-item">
                                                <span class="badge badge-danger">{{ $var->relNomina->id }}</span>
                                                {{ $var->relNomina->organismo . ' - ' . $var->relNomina->nombre }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
