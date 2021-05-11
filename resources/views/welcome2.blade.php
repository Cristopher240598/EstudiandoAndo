<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>EstudiandoAndo</title>
        <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('assets/img/Logo/logo%201.1.png') }}">
        <link rel="stylesheet" href="{{ asset('assets-intro/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-intro/fonts/simple-line-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-intro/css/styles.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    </head>
    <body style="font-family: Nunito,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;">
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
                                @if (Route::has('register'))
                                    <a class="nav-link active" href="{{ route('login') }}" style="font-size: 15px;">Iniciar sesión</a>
                                @endif
                            </li>
                        </ul>
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="{{ route('register') }}" style="font-size: 15px;">Registro</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @endif
        <main class="page landing-page" style="padding-top: 130px;">
            <section class="clean-block clean-hero" style="background-image:url(&quot;{{ asset('assets-intro/img/Inicio/fondo_principal.jpg') }}&quot;);color:rgba(8,106,172, 0.85);">
                <div class="text">
                    <h2 style="margin-bottom: 0px;">Asignamos actividades a padres e hijos</h2>
                </div>
            </section>
            <section class="clean-block clean-info dark" style="padding-top: 100px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6"><img class="img-thumbnail" data-bs-hover-animate="pulse" src="{{ asset('assets-intro/img/Inicio/Actividades.jpg') }}"></div>
                        <div class="col-md-6">
                            <h3 style="color: black;">Actividades</h3>
                            <div class="getting-started-info">
                                <p style="font-size: 18px; color: black;">Asignamos actividades mediante rutinas a padres o tutores e hijos dependiendo el nivel académico.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h3 style="color: black;">Libros</h3>
                            <div class="getting-started-info">
                                <p style="font-size: 18px; color: black;">Recomendamos libros para reforzar la comunicación entre familia y mejorar el rendimiento académico.</p>
                            </div>
                        </div>
                        <div class="col-md-6"><img class="img-thumbnail" data-bs-hover-animate="pulse" src="{{ asset('assets-intro/img/Inicio/libros.jpg') }}"></div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6"><img class="img-thumbnail" data-bs-hover-animate="pulse" src="{{ asset('assets-intro/img/Inicio/foro.jpg') }}"></div>
                        <div class="col-md-6">
                            <h3 style="color: black;">Foros</h3>
                            <div class="getting-started-info">
                                <p style="font-size: 18px; color: black;">Entre padres o tutores podrán comentar y opinar sobre situaciones determinadas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="page-footer dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h5>General</h5>
                        <ul>
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Iniciar sesión</a></li>
                            <li><a href="#">Registro</a></li>
                        </ul>
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
