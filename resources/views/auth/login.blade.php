@extends('layouts.header-footer-welcome')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        @if(session('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;{{ asset('assets/img/Inicio/familia.jpg') }}&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="mb-4" style="font-size: 22px;color: rgb(0,0,0);">Bienvenido</h4>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input class="form-control form-control-user @error('email') is-invalid @enderror" type="email" id="email" aria-describedby="emailHelp" placeholder="Correo electrónico o usuario" name="email" style="font-size: 18px;color: rgb(0,0,0);" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user @error('password') is-invalid @enderror" type="password" id="password" placeholder="Contraseña" name="password" style="font-size: 18px;color: rgb(0,0,0);" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-size: 18px;">Iniciar sesión</button>
                                        <hr>
                                        <!--<a class="btn btn-primary btn-block text-white btn-google btn-user" role="button" style="font-size: 18px;">
                                            <i class="fab fa-google"></i>&nbsp; Iniciar sesión con Google</a>
                                        <hr>-->
                                    </form>
<!--                                    <div class="text-center">
                                        @if (Route::has('password.request'))
                                            <a class="small subrayado" href="{{ route('password.request') }}" style="font-size: 16px; color: #4e73df; text-decoration: none;">¿Olvido su contraseña?</a>
                                        @endif
                                    </div>-->
                                    <div class="text-center">
                                        @if (Route::has('register'))
                                            <a class="small subrayado" href="{{ route('register') }}" style="font-size: 16px; color: #4e73df; text-decoration: none;">Registrese</a>
                                        @endif
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
