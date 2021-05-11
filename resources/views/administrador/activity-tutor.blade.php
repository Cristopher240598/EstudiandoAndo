@extends('layouts.header-footer-administrator')

@section('content')
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Actividades del tutor</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-primary" role="button" style="font-size: 18px; margin-bottom: 20px;" href="{{ route('admin.crear-actividad-tutor') }}">Agregar actividad</a>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="font-size: 18px;">Grado escolar&nbsp;</button>
                <div class="dropdown-menu" role="menu" style="width: 200px;font-size: 16px;">
                    <a class="dropdown-item" role="presentation" href="{{ route('admin.actividades-tutor', ['schoolGrade' => 'todas']) }}">Todos los grados</a>
                    @foreach($gradosEscolares as $gradoEscolar)
                        <a class="dropdown-item" role="presentation" href="{{ route('admin.actividades-tutor', ['schoolGrade' => $gradoEscolar->grado]) }}">{{ $gradoEscolar->grado }}</a>
                    @endforeach
                </div>
            </div>
            <!--            <form class="d-md-flex d-lg-flex d-xl-flex align-items-md-center align-items-lg-center align-items-xl-center user" style="margin: 20px 0;" id="buscadorActividadesTutor">
                <div class="col d-flex align-items-center col-forums">
                    <input class="form-control form-control-user" type="text" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Nombre" id="buscarActividadesTutor">
                    <button class="btn btn-primary btn-block text-white btn-user" type="submit" role="button" style="font-size: 18px;width: 50px;">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>-->
            <div class="text-center">
                <h1 id="1mes" style="font-size: 25px;color: rgb(78,115,223);margin-bottom: 20px;">{{ $gradoEscolarSelec }}</h1>
            </div>
            <div class="text-center"></div>
            <div class="row">
                @foreach($actividadesTutor as $actividadTutor)
                    <div class="col col-activities" style="margin-bottom: 10px;">
                        <div class="card">
                            <a href="{{ route('admin.ver-actividad-tutor', ['id' => $actividadTutor->id]) }}">
                                <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center marco zoom-on-hover">
                                    <img class="img-fluid image" src="{{ route('admin.actividad-tutor-imagen', ['filename'=> $actividadTutor->imagen]) }}">
                                </div>
                            </a>
                            <div class="card-body text-center">
                                <h6>
                                    <a class="event_title" style="font-size: 22px;" href="{{ route('admin.ver-actividad-tutor', ['id' => $actividadTutor->id]) }}">{{ $actividadTutor->nombre }}</a>
                                </h6>
                                <p class="text-center card-text objective_event" style="font-size: 18px;color: rgb(0,0,0);">{{ $actividadTutor->mes }}° mes</p>
                                <p class="text-center card-text objective_event" style="font-size: 18px;color: rgb(0,0,0);">{{ $actividadTutor->gradoEscolar->grado }}</p>
                                <div class="row" style="max-width: 100%;margin: 0px;padding-bottom: 20px;">
                                    <div class="col" style="padding: 6px 12px;">
                                        <a class="btn btn-primary" role="button" href="{{ route('admin.editar-actividad-tutor', ['id' => $actividadTutor->id]) }}" style="font-size: 18px;">Modificar</a>
                                    </div>
                                    <div class="col" style="padding: 6px 12px;">
                                        <a class="btn btn-danger" role="button" href="{{ route('admin.eliminar-actividad-tutor', ['id' => $actividadTutor->id ]) }}" style="font-size: 18px;">Eliminar</a>
                                    </div>
                                </div>
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
                        {{ $actividadesTutor->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
