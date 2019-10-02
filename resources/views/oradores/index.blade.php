@extends('layouts/app')

@section('titulo')
    Gestion de Oradores
@endsection

@section('content')

     <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ingrese el numero de asambleísta</h4>
                <form method="POST">
                    <div class="input-field col s12">
                        <input id="votante" name="votante" type="number" class="form-control mb-4" autofocus>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit"  class="btn btn-primary">Procesar</button>
                </form>
            </div>
        </div>
        <hr>
        @if (session('mensaje'))
            <div class="alert alert-danger">
                {{ session('mensaje') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-striped">
                    <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nombre</th>
                        <th>Baja</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($oradores as $var)
                        <tr>
                            <td>{{ $var->relNomina->id  }}</td>
                            <td>{{ $var->relNomina->nombre  }}</td>
                            <td><a href="{{url('asamblea/oradores/baja/' . $var->id)}}" onclick="return confirm('Esta seguro de dar de baja al Orador?')">Baja</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection
