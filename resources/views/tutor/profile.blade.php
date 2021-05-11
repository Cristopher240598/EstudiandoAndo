@extends('layouts.header-footer-tutor')

@section('content')
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Perfil</h6>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col col-create-student">
                    <div class="p-5">
                        <form class="user" method="POST" action="{{ route('tutor.actualizar-perfil') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input class="form-control form-control-user @error('nombre') is-invalid @enderror" type="text" id="nombre" name="nombre" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Nombre" value="{{ Auth::user()->nombre }}" required autocomplete="nombre" autofocus>
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center align-items-xl-center">
                                <div class="col col-create-student-ap col-create-student-app @error('apellidoPaterno') is-invalid @enderror" style="padding: 0px;">
                                    <input class="form-control form-control-user" type="text" id="apellidoPaterno" name="apellidoPaterno" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Apellido paterno" value="{{ Auth::user()->apellidoPaterno }}" required autocomplete="apellidoPaterno" autofocus>
                                    @error('apellidoPaterno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col col-create-student-ap col-create-student-apm" style="padding: 0px;">
                                    <input class="form-control form-control-user @error('apellidoMaterno') is-invalid @enderror" type="text" id="apellidoMaterno" name="apellidoMaterno"style="color: rgb(0,0,0);font-size: 18px;" placeholder="Apellido materno" value="{{ Auth::user()->apellidoMaterno }}" required autocomplete="apellidoMaterno" autofocus>
                                    @error('apellidoMaterno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-user @error('correoElectronico') is-invalid @enderror" type="email" id="correoElectronico" aria-describedby="emailHelp" placeholder="Correo electrónico" name="correoElectronico" style="font-size: 18px;color: rgb(0,0,0);" value="{{ Auth::user()->email }}" required autocomplete="email">
                                @error('correoElectronico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-size: 18px;">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header text-center">
            <h6 class="text-primary font-weight-bold m-0" style="font-size: 25px;">Contraseña</h6>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col col-create-student">
                    <div class="p-5">
                        <form class="user" method="POST" action="{{ route('tutor.actualizar-contrasenia') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Contraseña" style="font-size: 18px;color: rgb(0,0,0);" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user @error('newPassword') is-invalid @enderror" type="password" id="newPassword" name="newPassword" placeholder="Nueva contraseña" style="font-size: 18px;color: rgb(0,0,0);" required autocomplete="new-password">
                                    @error('newPassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="newPassword" type="password" class="form-control form-control-user" name="newPasswordConfirm" placeholder="Repetir nueva contraseña" style="font-size: 18px;color: rgb(0,0,0);" required autocomplete="new-password">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-size: 18px;">Cambiar contraseña</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection