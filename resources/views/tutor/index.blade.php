@extends('layouts.header-footer-tutor')

@section('content')
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Actividades</h6>
        </div>
        <div class="card-body">
            <div class="text-center">
                @if($totalActividades != null)
                    @if(isset($_GET["page"]))
                        <h1 id="1mes" style="font-size: 25px;color: rgb(78,115,223);margin-bottom: 20px;">{{ $_GET['page'] }}° Mes</h1>
                    @else
                        <h1 id="1mes" style="font-size: 25px;color: rgb(78,115,223);margin-bottom: 20px;">1° Mes</h1>
                    @endif
                    <h4 class="small font-weight-bold" style="font-size: 18px;color: rgb(0,0,0);">Avance {{ round(($totalActividadesTerminadas * 100)/$totalActividades) }}%</h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($totalActividadesTerminadas * 100)/$totalActividades }}%;">
                        </div>
                    </div>
                @else
                    <h1 id="1mes" style="font-size: 25px;color: rgb(78,115,223);margin-bottom: 20px;">Agrega un tutorado</h1>
                @endif
            </div>
            <div class="row">
                @foreach($asignacion as $actividad)
                    <div class="col col-activities" style="margin-bottom: 10px;">
                        <div class="card">
                            @if($actividad->estatus == null)
                                <a href="{{ route('tutor.actividad', ['id' => $actividad->actividadTutor->id]) }}">
                            @else
                                <a href="{{ route('tutor.actividad-terminada', ['id' => $actividad->actividadTutor->id]) }}">
                            @endif
                                <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center marco zoom-on-hover">
                                    <img class="img-fluid image" src="{{ route('admin.actividad-tutor-imagen', ['filename' => $actividad->actividadTutor->imagen]) }}">
                                </div>
                            </a>
                            <div class="card-body text-center">
                                <h6>
                                    @if($actividad->estatus == null)
                                        <a class="event_title" href="{{ route('tutor.actividad', ['id' => $actividad->actividadTutor->id]) }}" style="font-size: 22px;">{{ $actividad->actividadTutor->nombre }}</a>
                                    @else
                                        <a class="event_title" href="{{ route('tutor.actividad-terminada', ['id' => $actividad->actividadTutor->id]) }}" style="font-size: 22px;">{{ $actividad->actividadTutor->nombre }}</a>
                                    @endif
                                </h6>
                                <p class="text-justify card-text objective_event" style="font-size: 18px;color: rgb(0,0,0);">{{ $actividad->actividadTutor->objetivo }}</p>
                                @if($actividad->estatus == 1)
                                    <p class="text-center card-text objective_event" style="font-size: 18px;color: rgb(255,255,255);background-color: rgb(28,200,138);">Terminada</p>
                                @else
                                    <p class="text-center card-text objective_event" style="font-size: 18px;color: rgb(255,255,255);background-color: rgb(220,193,57);;">Pendiente</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row" style="font-size: 20px;color: rgb(0,0,0);">
                <div class="col-md-6 align-self-center">
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers" style="font-size: 18px;">
                        {{ $asignacion->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection