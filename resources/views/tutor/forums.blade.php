@extends('layouts.header-footer-tutor')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Foros</h6>
        </div>
        <div class="card-body">
            <form class="d-md-flex d-lg-flex d-xl-flex align-items-md-center align-items-lg-center align-items-xl-center user" style="margin: 20px 0;" id="buscadorForos">
                <div class="col d-flex align-items-center col-forums">
                    <input class="form-control form-control-user" type="text" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Tema del foro" id="buscarForos">
                    <button class="btn btn-primary btn-block text-white btn-user" type="submit" role="button" style="font-size: 18px;width: 50px;">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
            <div class="row">
                @foreach($foros as $foro)
                    <div class="col col-students" style="margin-bottom: 5px;">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="text-center card-title" style="color: rgb(0,0,0);">{{ $foro->tema }}</h4>
                            </div>
                            <div class="d-flex justify-content-around" style="margin-bottom: 20px;">
                                <a class="btn btn-primary" role="button" href="{{ route('tutor.foro', ['id' => $foro->id]) }}" style="font-size: 18px;">Participar</a>
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
                        {{ $foros->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection