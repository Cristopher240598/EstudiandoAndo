@extends('layouts.header-footer-tutor')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Crear foro</h6>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col col-create-student">
                    <div class="p-5">
                        <form class="user" method="POST" action="{{ route('tutor.guardar-foro') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input class="form-control form-control-user @error('tema') is-invalid @enderror" id="tema" name="tema" type="text" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Tema" value="{{ old('tema') }}" required autocomplete="off" autofocus>
                                @error('tema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-user @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" placeholder="Descripción" style="font-size: 18px;color: rgb(0,0,0);" required autocomplete="off" autofocus>{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-block text-white btn-user" type="submit" role="button" style="font-size: 18px;">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection