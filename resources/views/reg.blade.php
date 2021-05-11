@extends('layouts.header-footer-welcome')

@section('content')
    <div class="container" >
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
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
                                        <input class="form-control form-control-user @error('name') is-invalid @enderror" type="text" id="name" placeholder="Nombre" name="name" style="font-size: 18px;color: rgb(0,0,0);" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Apellido paterno" name="nombre" style="font-size: 18px;color: rgb(0,0,0);">
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Apellido materno" name="apellidos" style="font-size: 18px;color: rgb(0,0,0);">
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
                                        <input class="form-control form-control-user" type="password" id="password-confirm" placeholder="Repetir contraseña" name="password-confirmation" style="font-size: 18px;color: rgb(0,0,0);" required autocomplete="new-password">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-size: 18px;">Registrarse</button>
                                <hr>
<!--                                <a class="btn btn-primary btn-block text-white btn-google btn-user" role="button" style="font-size: 18px;">
                                    <i class="fab fa-google"></i>&nbsp; Registrarse con Google
                                </a>
                                <hr>-->
                            </form>
                            <div class="text-center">
                                <a class="small subrayado" href="forgot-password.html" style="font-size: 16px; color: #4e73df; text-decoration: none;">¿Olvido su contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small subrayado" href="login.html" style="font-size: 16px; color: #4e73df; text-decoration: none;">¿Ya está registrado? inicie sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<!--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection-->