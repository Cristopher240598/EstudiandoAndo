@extends('layouts.header-footer-administrator')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Actividades</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col col-tutor-admin">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-center text-primary m-0 font-weight-bold" style="font-size: 22px;">Tutores</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-tutores-admin-int-1">
                                    <img src="{{ url('assets/img/Tutores/tutores.jpeg') }}" style="width: 100%;">
                                </div>
                                <div class="col d-flex justify-content-center align-items-center col-tutores-admin-int-2">
                                    <a class="btn btn-primary" role="button" style="font-size: 18px;" href="{{ route('admin.actividades-tutor', ['schoolGrade' => 'todas']) }}">Administrar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-tutor-admin">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-center text-primary m-0 font-weight-bold" style="font-size: 22px;">Tutorados</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-tutores-admin-int-1">
                                    <img src="{{ url('assets/img/Tutorados/jovenes.jpg') }}" style="width: 100%;">
                                </div>
                                <div class="col d-flex justify-content-center align-items-center col-tutores-admin-int-2">
                                    <a class="btn btn-primary" role="button" style="font-size: 18px;" href="{{ route('admin.actividades-tutorado', ['schoolGrade' => 'todas']) }}">Administrar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
@endsection
