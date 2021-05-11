@extends('layouts.header-footer-tutor')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Agregar tutorado</h6>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col col-create-student">
                    <div class="p-5">
                        <form class="user" method="POST" action="{{ route('tutor.guardar-tutorado') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input class="form-control form-control-user @error('nombre') is-invalid @enderror" type="text" id="nombre" name="nombre" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Nombre" value="{{ old('nombre') }}" required autocomplete="off" autofocus>
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center align-items-xl-center">
                                <div class="col col-create-student-ap col-create-student-app" style="padding: 0px;">
                                    <input class="form-control form-control-user @error('apellidoPaterno') is-invalid @enderror" type="text" id="apellidoPaterno" name="apellidoPaterno" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Apellido paterno" value="{{ old('apellidoPaterno') }}" required autocomplete="off" autofocus>
                                    @error('apellidoPaterno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col col-create-student-ap col-create-student-apm" style="padding: 0px;">
                                    <input class="form-control form-control-user @error('apellidoMaterno') is-invalid @enderror" type="text" id="apellidoMaterno" name="apellidoMaterno" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Apellido materno" value="{{ old('apellidoMaterno') }}" required autocomplete="off" autofocus>
                                    @error('apellidoMaterno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror    
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="color: rgb(0,0,0);font-size: 18px;">Grado escolar</label>
                                <select class="form-control" id="gradoEscolar" name="gradoEscolar" style="font-size: 18px;border-radius: 10rem;color: rgb(0,0,0);width: 200px;" required autofocus>
                                    <optgroup label="Grado escolar">
                                        @foreach($gradosEscolares as $gradoEscolar)
                                            <option value="{{ $gradoEscolar->grado }}">{{ $gradoEscolar->grado }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user @error('password') is-invalid @enderror" type="password" id="password" placeholder="Contraseña" name="password" style="font-size: 18px;color: rgb(0,0,0);" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Repetir contraseña" style="font-size: 18px;color: rgb(0,0,0);" required autocomplete="new-password">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block text-white btn-user" type="submit" role="button" style="font-size: 18px;">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection