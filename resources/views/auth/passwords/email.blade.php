@extends('layouts.header-footer-welcome')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-password-image" style="background-image: url(&quot;{{ asset('assets/img/Inicio/pareja1.jpg') }}&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="mb-2" style="color: rgb(0,0,0);font-size: 22px;">¿Olvido su contraseña?</h4>
                                        <p class="mb-4" style="color: rgb(0,0,0);font-size: 18px;">Ingrese su dirección de correo electrónico a continuación y le enviaremos un correo con su nueva contraseña.</p>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('password.email') }}">
                                        <div class="form-group">
                                            <input class="form-control form-control-user @error('email') is-invalid @enderror" type="email" id="email" aria-describedby="emailHelp" placeholder="Correo electrónico" name="email" style="font-size: 18px;" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-size: 18px;">Cambiar contraseña</button>
                                    </form>
                                    <div class="text-center">
                                        <hr>
                                        <a class="small subrayado" href="{{ route('register') }}" style="font-size: 16px; color: #4e73df; text-decoration: none;">Registrese</a>
                                    </div>
                                    <div class="text-center subrayado">
                                        <a class="small" href="{{ route('login') }}" style="font-size: 16px; color: #4e73df; text-decoration: none;">¿Ya está registrado? inicie sesión</a>
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
