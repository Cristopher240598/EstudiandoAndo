@extends('layouts.header-footer-tutor')

@section('content')
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Tutorados</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-primary" role="button" style="font-size: 18px;" href="{{ route('tutor.crear-tutorado') }}">Agregar tutorado</a>
        </div>
        <hr style="margin: 0px;">
        <div class="card-body">
            <div class="text-center">
                <h1 style="font-size: 25px;color: rgb(78,115,223);">Mis tutorados</h1>
            </div>
            <div class="row">
                @foreach($tutorados as $tutorado)
                    <div class="col col-students" style="margin-bottom: 5px;">
                        <div class="card text-center">
                            <i class="fas fa-street-view" style="color: #086aac;font-size: 150px;margin-top: 20px;"></i>
                            <div class="card-body">
                                <h4 class="text-center card-title" style="color: rgb(0,0,0);">
                                    <a href="{{ route('tutor.actividades-tutorado', ['idTutorado' => $tutorado->id]) }}">{{ $tutorado->usuario->nombre . ' ' . $tutorado->usuario->apellidoPaterno . ' ' . $tutorado->usuario->apellidoMaterno }}</a>
                                </h4>
                                <p style="font-size: 18px;color: rgb(0,0,0);margin: 0px;">Usuario: {{ $tutorado->usuario->email }}<br/>Grado escolar: {{ $tutorado->gradoEscolar->grado }}</p>
                            </div>
                            <div class="row" style="max-width: 100%;margin: 0px;padding-bottom: 20px;">
                                <div class="col" style="padding: 6px 12px;">
                                    <a class="btn btn-primary" role="button" href="{{ route('tutor.editar-tutorado', ['id' => $tutorado->id]) }}" style="font-size: 18px;">Modificar</a>
                                </div>
                                <div class="col" style="padding: 6px 12px;"> 
                                    <a class="btn btn-danger" role="button" href="{{ route('tutor.eliminar-tutorado', ['id' => $tutorado->id ]) }}" style="font-size: 18px;">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection