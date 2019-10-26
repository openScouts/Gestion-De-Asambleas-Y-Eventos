@extends('layouts/app')

@section('titulo')
    Acreditacion al Evento
@endsection

@section('content')
    <a href="{{url('nomina')}}"  class="btn btn-primary">Nomina</a>
    <div class="card">
        <div class="card-body">
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
    @if(!empty($mensaje))
        <div class="row">
            <div class="col s12">
                <div class="alert {{ $color }}"  role="alert">
                    {{ $mensaje }}
                </div>
            </div>
        </div>
    @endif

@endsection
