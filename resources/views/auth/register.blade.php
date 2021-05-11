@extends('layouts.header-footer-welcome')

@section('content')
<div class="container" >
    <div class="card shadow-lg o-hidden border-0 my-5">
        <div class="card-body p-0">
            @if(session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-5 d-none d-lg-flex">
                    <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;{{ asset('assets/img/Inicio/pareja.jpg') }}&quot;);"></div>
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h4 class="mb-4" style="color: rgb(0,0,0);font-size: 22px;">Registro</h4>
                        </div>
                        <form class="user" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user @error('nombre') is-invalid @enderror" type="text" id="nombre" placeholder="Nombre" name="nombre" style="font-size: 18px;color: rgb(0,0,0);" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user @error('apellidoPaterno') is-invalid @enderror" type="text" id="apellidoPaterno" placeholder="Apellido paterno" name="apellidoPaterno" style="font-size: 18px;color: rgb(0,0,0);" value="{{ old('apellidoPaterno') }}" required autocomplete="apellidoPaterno" autofocus>
                                    @error('apellidoPaterno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control form-control-user @error('apellidoMaterno') is-invalid @enderror" type="text" id="apellidoMaterno" placeholder="Apellido materno" name="apellidoMaterno" style="font-size: 18px;color: rgb(0,0,0);" value="{{ old('apellidoMaterno') }}" required autocomplete="apellidoMaterno" autofocus>
                                    @error('apellidoMaterno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-user @error('email') is-invalid @enderror" type="email" id="email" aria-describedby="emailHelp" placeholder="Correo electrónico" name="email" style="font-size: 18px;color: rgb(0,0,0);" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                            <button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-size: 18px;">Registrarse</button>
                            <hr>
                            <!--<a class="btn btn-primary btn-block text-white btn-google btn-user" role="button" style="font-size: 18px;">
                                    <i class="fab fa-google"></i>&nbsp; Registrarse con Google
                                </a>
                                <hr>-->
                        </form>
<!--                        <div class="text-center">
                            @if (Route::has('password.request'))
                                <a class="small subrayado" href="{{ route('password.request') }}" style="font-size: 16px; color: #4e73df; text-decoration: none;">¿Olvido su contraseña?</a>
                            @endif
                        </div>-->
                        <div class="text-center">
                            <a class="small subrayado" href="{{ route('login') }}" style="font-size: 16px; color: #4e73df; text-decoration: none;">¿Ya está registrado? inicie sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
