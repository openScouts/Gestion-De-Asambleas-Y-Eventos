@extends('layouts/app')

@section('titulo')
    Acreditacion Asamblea
@endsection
@section('content')
    <a href="{{url('/asamblea/oradores')}}"  class="btn btn-primary">Oradores</a>
    <a href="{{url('/asamblea/listado')}}"  class="btn btn-primary">Listado</a>
    <a href="{{url('/asamblea/ausente_masivo')}}"  class="btn btn-warning">Ausente Masivo</a>
    
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
