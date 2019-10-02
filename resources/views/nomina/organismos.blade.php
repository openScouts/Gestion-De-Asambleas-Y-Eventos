@extends('layouts/app')

@section('titulo')
    Detalle de los Organismos
@endsection

@section('content')
        <div class="card">
            <div class="card-body">
                <div class="card-title">Detalle</div>
                <div class="card-body">
                    <table class="table table-sm table-striped">
                    <thead>
                    <tr>
                        <th>Organismo</th>
                        <th>Presentes</th>
                        <th>Ausentes</th>
                        <th>Total</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataSet as $var)
                        <tr>
                            <td>{{ $var->organismo  }}</td>
                            <td>{{ $var->presentes  }}</td>
                            <td>{{ $var->ausentes  }}</td>
                            <td>{{ $var->total  }}</td>
                            <td><a href="{{url('/nomina/pdf/'.$var->organismo)}}" target="_blank">Exportar Nomina</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
