@extends('layouts/app')

@section('titulo')
    Nomina del Evento
@endsection

@section('content')

        <a href="{{url('asamblea/listado')}}"  class="btn btn-primary">Borrar Filtro</a>
        <a href="{{url('asamblea/listado?ausente=N')}}"  class="btn btn-primary">Ver Ausente</a>
        <a href="{{url('asamblea/listado?ausente=S')}}"  class="btn btn-primary">Ver Presentes</a>
        <div class="card">
            <div class="card-body">
                <div class="card-title">Nomina</div>
                <div class="card-body">
                    <table class="table table-sm table-striped">
                    <thead>
                    <tr>
                        <th>Numero</th>
                        <th>organismo</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nomina as $var)
                        <tr>
                            <td>{{ $var->id  }}</td>
                            <td><a href="{{url('/asamblea/listado?filtrar=' . $var->organismo )}}" >{{ $var->organismo }} </a></td>
                            <td>{{ $var->documento  }}</td>
                            <td>{{ $var->nombre  }}</td>
                            @if($var->asamblea  == 'S')
                                <td class="success-color text-white">Presente</td>
                            @else
                                <td class="danger-color text-white">Ausente</td>
                            @endif
                            <td><a href="{{url('asamblea/historico/' . $var->id )}}" >Ver Historico</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
