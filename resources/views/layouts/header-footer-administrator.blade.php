<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>EstudiandoAndo</title>
        <link rel="icon" type="image/png" sizes="512x512" href="{{ url('assets/img/Logo/logo%201.1.png') }}">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome5-overrides.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
        <link rel="stylesheet" href="{{ asset('assets/css/untitled.css') }}">
    </head>
    <body id="page-top">
        <div id="wrapper">
            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary-prb p-0" style="max-width: 100px;">
                <div class="container-fluid d-flex flex-column p-0">
                    <ul class="nav navbar-nav text-light" id="accordionSidebar" style="margin-top: 70px;max-width: 100px;">
                        <li class="nav-item" role="presentation" style="max-width: 100%;">
                            <a class="nav-link text-center" href="{{ route('admin.tutores') }}" style="font-size: 15px;max-width: 100%;">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center">Tutores</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation" style="max-width: 100%;">
                            <a class="nav-link text-center" style="font-size: 15px;max-width: 100%;" href="{{ route('admin.actividades') }}">
                                <i class="far fa-edit"></i>
                                <span class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center">Actividades</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation" style="max-width: 100%;">
                            <a class="nav-link text-center" style="font-size: 15px;max-width: 100%;" href="{{ route('admin.sug-com') }}">
                                <i class="fas fa-comment"></i>
                                <span class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center">Sugerencias o comentarios</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation" style="max-width: 100%;">
                            <a class="nav-link text-center" style="font-size: 15px;max-width: 100%;" href="{{ route('admin.grado-escolar') }}">
                                <i class="fas fa-school"></i>
                                <span class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center">Grados escolares</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                        <div class="container-fluid">
                            <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
                                <i class="fas fa-bars"></i>
                            </button>
                            <a class="navbar-brand logo" data-aos="fade-right" data-aos-duration="1000" href="{{ route('admin.actividades') }}" style="font-family: Nunito, sans-serif;color: #0b00aa;">
                                <img data-aos="zoom-in" data-aos-duration="1500" data-aos-delay="500" src="{{ url('assets/img/Logo/logo%201.png') }}" style="height: 60px;padding-right: 10px;">EstudiandoAndo
                            </a>
                            <ul class="nav navbar-nav flex-nowrap ml-auto">
                                <li class="nav-item dropdown no-arrow" role="presentation">
                                    <div class="nav-item dropdown no-arrow">
                                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                            <span class="d-none d-lg-inline mr-2 small" style="color: rgb(0,0,0);font-size: 15px;">{{ Auth::user()->nombre }}</span>
                                            <i class="fas fa-user-tie" style="color: #086aac;font-size: 20px;"></i>
                                        </a>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu" style="font-size: 15px;">
                                            <a class="dropdown-item" role="presentation" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Cerrar sesión
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright">
                            <span style="font-size: 16px;color: rgb(0,0,0);">Copyright &copy; EstudiandoAndo <?= date('Y') ?></span>
                        </div>
                    </div>
                </footer>
            </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/js/bs-init.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="{{ asset('assets/js/preguntas.js') }}"></script>
        <script src="{{ asset('assets/js/theme.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/imagen.js') }}"></script>
    </body>
</html>