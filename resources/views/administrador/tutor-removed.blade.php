@extends('layouts.header-footer-administrator')

@section('content')
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Tutores inactivos</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 text-nowrap">
                </div>
                <div class="col-md-6">
                    <div class="text-md-right d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-sm-start justify-content-md-end justify-content-lg-end justify-content-xl-end dataTables_filter" id="dataTable_filter">
                        <form class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center" id="buscadorTutoresInactivos">
                            <input class="form-control" type="text" placeholder="Buscar nombre" style="color: rgb(0,0,0);" id="buscarTutoresInactivos">
                            <button class="btn btn-primary" type="submit" style="height: 37px;">
                                <i class="fa fa-search" style="font-size: 18px;"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info" style="font-size: 18px;">
                <table class="table dataTable my-0" id="dataTable">
                    <thead style="color: #267d24;">                        
                            <tr>
                                <th class="text-primary" style="font-size: 18px;">Nombre usuario</th>
                                <th class="text-primary" style="font-size: 18px;">Correo electrónico</th>
                                <th class="text-primary" style="font-size: 18px;">Estado</th>
                            </tr>                        
                    </thead>
                    <tbody style="color: rgb(0,0,0);">
                        @foreach($tutores as $tutor)
                            <tr>
                                <td>{{ $tutor->nombre . ' ' . $tutor->apellidoPaterno . ' ' . $tutor->apellidoMaterno }}</td>
                                <td>{{ $tutor->email }}</td>
                                <td>
                                    <a class="btn btn-primary" role="button" href="{{ route('admin.activar-tutor', ['idUsuario' => $tutor->id]) }}" style="margin-right: 10px;">Activar</a>
                                    <a class="btn btn-danger btn-estado" role="button" href="{{ route('admin.eliminar-tutor', ['id' => $tutor->id])}}">Eliminar definitivamente</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style="color: #267d24;">
                        <tr>
                            <td><strong class="text-primary">Nombre usuario</strong>&nbsp;</td>
                            <td><strong class="text-primary">Correo electrónico</strong></td>
                            <td><strong class="text-primary">Estado</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row" style="font-size: 20px;color: rgb(0,0,0);">
                <div class="col-md-6 align-self-center">
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers" style="font-size: 18px;">
                        {{ $tutores->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection