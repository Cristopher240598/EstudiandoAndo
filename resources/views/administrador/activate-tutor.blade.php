@extends('layouts.header-footer-administrator')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Tutores</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col col-tutor-admin">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-center text-primary m-0 font-weight-bold" style="font-size: 22px;">Pendientes</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-tutores-admin-int-1">
                                    <img src="{{ url('assets/img/Tutores/tutore-pendiente.jpg') }}" style="width: 100%;">
                                </div>
                                <div class="col d-flex justify-content-center align-items-center col-tutores-admin-int-2">
                                    <a class="btn btn-primary" role="button" style="font-size: 18px;" href="{{ route('admin.tutor-pendiente') }}">Administrar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-tutor-admin">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-center text-primary m-0 font-weight-bold" style="font-size: 22px;">Activos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-tutores-admin-int-1">
                                    <img src="{{ url('assets/img/Tutores/tutor-activo.jpg') }}" style="width: 100%;">
                                </div>
                                <div class="col d-flex justify-content-center align-items-center col-tutores-admin-int-2">
                                    <a class="btn btn-primary" role="button" style="font-size: 18px;" href="{{ route('admin.tutor-activo') }}">Administrar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex d-xl-flex justify-content-center">
                <div class="col col-tutor-admin" style="max-width: 50%;">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-center text-primary m-0 font-weight-bold" style="font-size: 22px;">Inactivos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-tutores-admin-int-1">
                                    <img src="{{ url('assets/img/Tutores/tutor-inactivo.jpg') }}" style="width: 100%;">
                                </div>
                                <div class="col d-flex justify-content-center align-items-center col-tutores-admin-int-2">
                                    <a class="btn btn-primary" role="button" style="font-size: 18px;" href="{{ route('admin.tutor-eliminado') }}">Administrar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection