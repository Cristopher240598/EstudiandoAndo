@extends('layouts.header-footer-administrator')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">{{ $actividadTutor->nombre }}</h6>
        </div>
        <div class="card-body">
            <div class="row" style="min-width: 100%;max-width: 100%;">
                <div class="col d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center">
                    <img src="{{ route('admin.actividad-tutor-imagen', ['filename' => $actividadTutor->imagen]) }}" style="max-width: 100%;">
                </div>
                <div class="col" style="min-width: 100%;max-width: 100%;">
                    <div class="p-5" style="padding: 30px!important;">
                        <div class="d-flex justify-content-center">
                            <div class="row" style="width: 400px;">
                                <div class="col">
                                    <h1 class="text-center" style="font-size: 22px;color: rgb(78,115,223);">Mes</h1>
                                    <p class="text-center" style="font-size: 18px;color: rgb(0,0,0);">{{ $actividadTutor->mes }}</p>
                                </div>
                                <div class="col">
                                    <h1 class="text-center" style="font-size: 22px;color: rgb(78,115,223);">Grado escolar</h1>
                                    <p class="text-center" style="font-size: 18px;color: rgb(0,0,0);">{{ $actividadTutor->gradoEscolar->grado }}</p>
                                </div>
                            </div>
                        </div>
                        <h1 class="text-center" style="font-size: 22px;color: rgb(78,115,223);">Objetivo</h1>
                        <p class="text-justify" style="font-size: 18px;color: rgb(0,0,0);">{{ $actividadTutor->objetivo }}</p>
                        <h1 class="text-center" style="font-size: 22px;color: rgb(78,115,223);">Instrucciones</h1>
                        <p class="text-justify" style="font-size: 18px;color: rgb(0,0,0);">{{ $actividadTutor->instrucciones }}</p>
                        @if($actividadTutor->enlace != null || $actividadTutor->archivo != null)
                            <h1 class="text-center" style="font-size: 22px;color: rgb(78,115,223);">Extra</h1>
                            @if($actividadTutor->enlace != null)
                                <p class="text-justify" style="font-size: 18px;color: rgb(0,0,0);">
                                    <a href="{{ $actividadTutor->enlace }}" target="_blank">{{ $actividadTutor->enlace }}</a>
                                </p>
                            @endif
                            @if($actividadTutor->archivo != null)
                                <div class="d-flex justify-content-center" style="margin-bottom: 16px;">
                                    <a class="btn btn-primary" role="button" href="{{ route('admin.actividad-tutor-archivo', ['filename' => $actividadTutor->archivo]) }}" download="archivo">
                                        <i class="fa fa-download" style="margin-right: 5px;"></i>Descargar archivo
                                    </a>
                                </div>
                            @endif
                        @endif
                        <h1 class="text-center" style="font-size: 22px;color: rgb(78,115,223);">Preguntas</h1>
                        @foreach($actividadTutor->preguntasTutor as $pregunta )
                            <p class="text-justify" style="font-size: 18px;color: rgb(0,0,0);">{{ $pregunta->pregunta }}</p>
                        @endforeach
                        <h1 class="text-center" style="font-size: 22px;color: rgb(78,115,223);">Actividad aprobada por</h1>
                        <p class="text-center" style="font-size: 18px;color: rgb(0,0,0);">{{ $actividadTutor->especialista }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection