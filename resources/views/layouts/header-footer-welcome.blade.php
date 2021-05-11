<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>EstudiandoAndo</title>
        <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('assets/img/Logo/logo%201.1.png') }}">
        <link rel="stylesheet" href="{{ asset('assets-intro/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome5-overrides.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css"> 
        <link rel="stylesheet" href="{{ asset('assets-intro/fonts/simple-line-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-intro/css/styles.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
        <style>
            .subrayado:hover
            {
                color: #224abe!important;
                text-decoration: underline!important;
            }
        </style>
    </head>
    <body class="background-register">
        @if (Route::has('login'))
            <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="padding-top: 15px;padding-bottom: 15px;">
                <div class="container">
                    <a class="navbar-brand logo" data-aos="fade-right" data-aos-duration="1000" href="" style="font-family: Nunito, sans-serif;color: #0b00aa;"><img data-aos="zoom-in" data-aos-duration="1500" data-aos-delay="500" src="{{ asset('assets-intro/img/Logo/logo%201.png') }}" style="height: 90px;padding-right: 20px;">EstudiandoAndo</a>
                    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-xl-flex justify-content-xl-end" id="navcol-1" style="max-width: 45%;">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="{{ url('/') }}" style="font-size: 15px;">inicio</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="{{ route('login') }}" style="font-size: 15px;">Iniciar sesión</a>                               
                            </li>
                        </ul>
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" role="presentation">
                                @if (Route::has('register'))
                                    <a class="nav-link active" href="{{ route('register') }}" style="font-size: 15px;">Registro</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @endif
        <main class="page landing-page" style="padding-top: 130px; height: 100%">
            @yield('content')
        </main>
        <footer class="page-footer dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        @if (Route::has('login'))
                            <h5>General</h5>
                            <ul>
                                <li><a href="{{ url('/') }}">Inicio</a></li>
                                <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Registro</a></li>
                                @endif
                            </ul>
                        @endif
                    </div>
                    <div class="col-sm-3" style="margin-left: auto;"><span class="d-xl-flex justify-content-xl-start align-items-xl-center" style="color: rgb(210,209,209);margin-top: 30px;"><img style="height: 12px;padding-right: 5px;" src="{{ asset('assets-intro/img/Bandera/Bandera_Mexico.png') }}">México</span></div>
                </div>
            </div>
            <div class="footer-copyright">
                <p>Copyright &copy; EstudiandoAndo <?= date('Y') ?></p>
            </div>
        </footer>
        <script src="{{ asset('assets-intro/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets-intro/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
        <script src="{{ asset('assets-intro/js/script.min.js') }}"></script>
    </body>
</html>