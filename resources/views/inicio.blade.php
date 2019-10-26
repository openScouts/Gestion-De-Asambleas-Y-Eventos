<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestion De Acreditaciones Scouts</title>
        <link type="text/css" rel="stylesheet" href="{{ url('css/mdb.css') }}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{ url('css/bootstrap.css') }}"  media="screen,projection"/>

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
                        <div class="card text-white bg-primary mb-3"  style="max-width: 20rem;">
                            <div class="card-body" >
                                <h4 class="card-title" class="center-align">Padron Asambleario</h4>
                                <h1 class="display-1" class="center-align">{{ $totalPadron }}</h1>
                            </div>
                        </div>
                        <div class="card text-white bg-primary mb-3"  style="max-width: 20rem;">
                            <div class="card-body" >
                                <h4 class="card-title" class="center-align">Acreditados</h4>
                                <h1 class="display-1" class="center-align">{{ $acreditados }}</h1>
                            </div>
                        </div>
                         <div class="card text-white bg-primary mb-3"  style="max-width: 20rem;">
                            <div class="card-body" >
                                <h4 class="card-title" class="center-align">Quorum</h4>
                                <h1 class="display-1" class="center-align">{{ $quorum }}</h1>
                            </div>
                        </div>
                        <div class="card text-white bg-primary mb-3"  style="max-width: 20rem;">
                            <div class="card-body" >
                                <h4 class="card-title" class="center-align">Acreditados Ausentes</h4>
                                <h1 class="display-1" class="center-align">{{ $acreditadosAusentes }}</h1>
                            </div>
                        </div>
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
