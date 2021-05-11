@extends('layouts.header-footer-tutor')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Foros</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col col-tutor-admin">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-center text-primary m-0 font-weight-bold" style="font-size: 22px;">Mis foros</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-tutores-admin-int-1 marco">
                                    <div class="marco zoom-on-hover">
                                        <img class="img-fluid image" src="{{ url('assets/img/Foros/misForos.jpg') }}" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center col-tutores-admin-int-2">
                                    <a class="btn btn-primary" role="button" style="font-size: 18px;" href="{{ route('tutor.mis-foros') }}">Ver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-tutor-admin">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-center text-primary m-0 font-weight-bold" style="font-size: 22px;">Foros</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-tutores-admin-int-1">
                                    <div class="marco zoom-on-hover">
                                        <img class="img-fluid image" src="{{ url('assets/img/Foros/foros.jpg') }}" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center col-tutores-admin-int-2">
                                    <a class="btn btn-primary" role="button" style="font-size: 18px;" href="{{ route('tutor.foros') }}">Ver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
@endsection