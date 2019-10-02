@extends('layouts/app')

@section('titulo')
    Nomina
@endsection

@section('content')
        <a href="{{url('nomina')}}"  class="btn btn-primary">Volver a Nomina</a>

        <div class="card">
            <div class="card-body">
                <div class="card-title">Nomina</div>
                <div class="card-body">
                    <table class="table table-sm table-striped">
                    <thead>
                    <tr>
                        <th>Numero</th>
                        <th>hora</th>
                        <th>Estado</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logs as $var)
                        <tr>
                            <td>{{ $var->id  }}</td>
                            <td>{{ $var->hora  }}</td>
                            @if($var->presente  == 'S')
                                <td class="success-color text-white">Presente</td>
                            @else
                                <td class="danger-color text-white">Ausente</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
