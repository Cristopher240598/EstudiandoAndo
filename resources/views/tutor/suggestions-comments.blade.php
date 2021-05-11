@extends('layouts.header-footer-tutor')

@section('content')
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header d-xl-flex justify-content-xl-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Sugerencias o comentarios</h6>
        </div>
        <div class="card-body">
            <div class="row d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center mb-3">
                <div class="col-lg-7">
                    <div class="p-5">
                        <form class="user" method="POST" action="{{ route('tutor.guardar-sug-com') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label style="font-size: 18px;color: rgb(0,0,0);margin-right: 10px;">Tema</label>
                                    <select class="form-control display-inline-block @error('tema') is-invalid @enderror" id="tema" name="tema" style="color: rgb(0,0,0);font-size: 18px;height: 50px;" required autofocus>
                                        <optgroup label="Tema">
                                            <option value="Tutores">Tutores</option>
                                            <option value="Tutorados">Tutorados</option>
                                            <option value="Actividades">Actividades</option>
                                            <option value="Foros">Foros</option>
                                            <option value="Otro">Otro</option>
                                        </optgroup>
                                    </select>
                                    @error('tema')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0" style="min-width: 100%;">
                                    <textarea class="form-control form-control-user @error('texto') is-invalid @enderror" placeholder="Sugerencia o comentario" id="texto" name="texto" style="font-size: 18px;color: rgb(0,0,0);" required autocomplete="off" autofocus>{{ old('texto') }}</textarea>
                                    @error('texto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-size: 18px;">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection