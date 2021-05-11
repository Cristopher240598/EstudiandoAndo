@extends('layouts.header-footer-administrator')

@section('content')
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Sugerencias o comentarios</h6>
        </div>
        <div class="card-body">
            <div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1" style="font-size: 18px;color: rgb(0,0,0);">Tutores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" role="tab" data-toggle="tab" href="#tab-2" style="font-size: 18px;color: rgb(0,0,0);">Tutorados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" role="tab" data-toggle="tab" href="#tab-3" style="font-size: 18px;color: rgb(0,0,0);">Actividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" role="tab" data-toggle="tab" href="#tab-4" style="font-size: 18px;color: rgb(0,0,0);">Foros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" role="tab" data-toggle="tab" href="#tab-5" style="font-size: 18px;color: rgb(0,0,0);">Otros</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="tab-1">
                        <div class="card shadow">
                            <div class="card-body"> 
                                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info" style="font-size: 18px;">
                                    <table class="table dataTable my-0" id="dataTable">
                                        <thead style="color: #267d24;">
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px;width: 90%;">Sugerencia o comentario</th>
                                                <th class="text-primary" style="font-size: 18px;width: 10%;">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: rgb(0,0,0);">
                                            @foreach($tutores as $tutor)
                                                <tr>
                                                    <td class="text-justify">{{ $tutor->texto }}</td>
                                                    <td>
                                                        <a class="btn btn-danger" role="button" href="{{ route('admin.eliminar-sug-com', ['id' => $tutor->id]) }}">Eliminar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot style="color: #267d24;">
                                            <tr>
                                                <td><strong class="text-primary">Sugerencia o comentario</strong>&nbsp;</td>
                                                <td><strong class="text-primary">Acción</strong></td>
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
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-2">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info" style="font-size: 18px;">
                                    <table class="table dataTable my-0" id="dataTable">
                                        <thead style="color: #267d24;">
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px;width: 90%;">Sugerencia o comentario</th>
                                                <th class="text-primary" style="font-size: 18px;width: 10%;">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: rgb(0,0,0);">
                                            @foreach($tutorados as $tutorado)
                                                <tr>
                                                    <td class="text-justify">{{ $tutorado->texto }}</td>
                                                    <td>
                                                        <a class="btn btn-danger" role="button" href="{{ route('admin.eliminar-sug-com', ['id' => $tutorado->id]) }}">Eliminar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot style="color: #267d24;">
                                            <tr>
                                                <td><strong class="text-primary">Sugerencia o comentario</strong>&nbsp;</td>
                                                <td><strong class="text-primary">Acción</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="row" style="font-size: 20px;color: rgb(0,0,0);">
                                    <div class="col-md-6 align-self-center">
                                    </div>
                                    <div class="col-md-6">
                                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers" style="font-size: 18px;">
                                            {{ $tutorados->links() }}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info" style="font-size: 18px;">
                                    <table class="table dataTable my-0" id="dataTable">
                                        <thead style="color: #267d24;">
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px;width: 90%;">Sugerencia o comentario</th>
                                                <th class="text-primary" style="font-size: 18px;width: 10%;">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: rgb(0,0,0);">
                                            @foreach($actividades as $actividad)
                                                <tr>
                                                    <td class="text-justify">{{ $actividad->texto }}</td>
                                                    <td>
                                                        <a class="btn btn-danger" role="button" href="{{ route('admin.eliminar-sug-com', ['id' => $actividad->id]) }}">Eliminar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot style="color: #267d24;">
                                            <tr>
                                                <td><strong class="text-primary">Sugerencia o comentario</strong>&nbsp;</td>
                                                <td><strong class="text-primary">Acción</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="row" style="font-size: 20px;color: rgb(0,0,0);">
                                    <div class="col-md-6 align-self-center">
                                    </div>
                                    <div class="col-md-6">
                                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers" style="font-size: 18px;">
                                            {{ $actividades->links() }}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info" style="font-size: 18px;">
                                    <table class="table dataTable my-0" id="dataTable">
                                        <thead style="color: #267d24;">
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px;width: 90%;">Sugerencia o comentario</th>
                                                <th class="text-primary" style="font-size: 18px;width: 10%;">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: rgb(0,0,0);">
                                            @foreach($foros as $foro)
                                                <tr>
                                                    <td class="text-justify">{{ $foro->texto }}</td>
                                                    <td>
                                                        <a class="btn btn-danger" role="button" href="{{ route('admin.eliminar-sug-com', ['id' => $foro->id]) }}">Eliminar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot style="color: #267d24;">
                                            <tr>
                                                <td><strong class="text-primary">Sugerencia o comentario</strong>&nbsp;</td>
                                                <td><strong class="text-primary">Acción</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
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
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-5">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info" style="font-size: 18px;">
                                    <table class="table dataTable my-0" id="dataTable">
                                        <thead style="color: #267d24;">
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px;width: 90%;">Sugerencia o comentario</th>
                                                <th class="text-primary" style="font-size: 18px;width: 10%;">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: rgb(0,0,0);">
                                            @foreach($otros as $otro)
                                                <tr>
                                                    <td class="text-justify">{{ $otro->texto }}</td>
                                                    <td>
                                                        <a class="btn btn-danger" role="button" href="{{ route('admin.eliminar-sug-com', ['id' => $otro->id]) }}">Eliminar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot style="color: #267d24;">
                                            <tr>
                                                <td><strong class="text-primary">Sugerencia o comentario</strong>&nbsp;</td>
                                                <td><strong class="text-primary">Acción</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="row" style="font-size: 20px;color: rgb(0,0,0);">
                                    <div class="col-md-6 align-self-center">
                                    </div>
                                    <div class="col-md-6">
                                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers" style="font-size: 18px;">
                                            {{ $otros->links() }}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection