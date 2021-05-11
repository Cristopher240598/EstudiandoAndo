@extends('layouts.header-footer-tutor')

@section('content')
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Foro</h6>
        </div>
        <div class="card-body">
            <div class="row" style="min-width: 100%;max-width: 100%;">
                <div class="col" style="min-width: 100%;max-width: 100%;">
                    <div class="p-5" style="padding: 30px!important;background-color: #f0f6ff;">
                        <div class="row">
                            <div class="col">
                                <p class="text-justify" style="font-size: 18px;color: rgb(0,0,0);margin: 0px;">
                                    <i class="fas fa-chalkboard-teacher" style="margin-right: 8px;color: #086aac;"></i>{{ $foro->tutor->usuario->nombre . ' ' . $foro->tutor->usuario->apellidoPaterno }}
                                </p>
                            </div>
                            <div class="col d-xl-flex justify-content-xl-end align-items-xl-end">
                                <p class="text-right" style="font-size: 14px;color: rgb(0,0,0);margin-bottom: 0!important;">{{ \FormatTime::LongTimeFilter($foro->fechaHora) }}</p>
                            </div>
                        </div>
                        <h1 class="text-center" style="font-size: 22px;color: rgb(78,115,223);">{{ $foro->tema }}</h1>
                        <p class="text-justify" style="font-size: 18px;color: rgb(0,0,0);">{{ $foro->descripcion }}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="text-center" style="padding-left: 30px;">
                <h1 class="text-left" style="font-size: 22px;color: rgb(78,115,223);">Comentarios ({{ count($foro->comentarios) }})</h1>
            </div>
            @foreach($foro->comentarios as $comentario)
                <div class="row" style="min-width: 100%;max-width: 100%;">
                    <div class="col" style="min-width: 100%;max-width: 100%;">
                        <div class="p-5" style="padding: 30px!important;">
                            <div class="row">
                                <div class="col">
                                    <p class="text-justify" style="font-size: 18px;color: rgb(0,0,0);margin: 0px;">
                                        <i class="fas fa-chalkboard-teacher" style="margin-right: 8px;color: #086aac;"></i>{{ $comentario->tutor->usuario->nombre . ' ' . $comentario->tutor->usuario->apellidoPaterno }}
                                    </p>
                                </div>
                                <div class="col d-xl-flex justify-content-xl-end align-items-xl-end">
                                    <p class="text-right" style="font-size: 14px;color: rgb(0,0,0);margin-bottom: 0!important;">{{ \FormatTime::LongTimeFilter($comentario->fechaHora) }}</p>
                                </div>
                            </div>
                            <p class="text-justify" style="font-size: 18px;color: rgb(0,0,0);margin-top: 20px;">{{ $comentario->comentario }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row" style="min-width: 100%;max-width: 100%;">
                <div class="col" style="min-width: 100%;max-width: 100%;">
                    <form class="user" method="POST" action="{{ route('tutor.guardar-comentario', ['idTema' => $foro->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control form-control-user @error('comentario') is-invalid @enderror" placeholder="Comentario" id="comentario" name="comentario" style="font-size: 18px;color: rgb(0,0,0);" required autocomplete="off" autofocus>{{ old('comentario') }}</textarea>
                            @error('comentario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-block text-white btn-user"  type="submit" role="button" style="font-size: 18px; max-width: 55%; margin: 0 auto;">Comentar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection