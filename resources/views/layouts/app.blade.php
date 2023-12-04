<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Invitaciones para eventos">
    <meta name="keywords"
        content="eventos, fiestas, invitaciones, invitaciones para eventos, invitaciones para fiestas, invitaciones para bodas, invitaciones para cumpleaños," />
    <meta name="robots" content="index" />
    <meta name="robots" content="noindex" />
    <title>
        @yield('title') | Te Invito
    </title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/header/main.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    @yield('styles')
</head>

<body>
    {{-- Header section --}}
    <nav class="navbar navbar-expand-lg fixed-top bg-deg-quaternary-3 m-0 rounded-bottom shadow-lg">
        <div class="container">
            <a class="navbar-brand text-white me-auto" href="#">Te Invito</a>
            <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">Te Invito</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link text-white mx-lg-2 active" aria-current="page" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mx-lg-2" href="/invitaciones">Invitaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mx-lg-2" href="/proveedores">Proveedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mx-lg-2" href="/contacto">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="/login" class="login-button me-4 text-white">Iniciar Sesión</a>
            <button class="navbar-toggler bg-secondary-ti" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>


    <div class="mt-1 pt-5">
        @yield('content')
    </div>


    {{-- footer section --}}
    <footer class="py-5 bg-deg-tertiary-3 text-white">
        <div class="">
            <div class="container">
                <div class="">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="">
                                <div class="">
                                    <h1>
                                        Te Invito
                                    </h1>
                                </div>
                                <p>
                                    Descubre la forma más fácil de invitar a tus amigos y familiares a tus eventos.
                                </p>
                                <p class="copyright-text">
                                    Diseñado y desarrollado por
                                    <a href="" class="link-light">
                                        Dratenz SS
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="">
                                <h3>
                                    Productos
                                </h3>
                                <div class="d-flex flex-column">
                                    <a href="" class="link-light text-decoration-none">Invitaciones</a>
                                    <a href="" class="link-light text-decoration-none">Proveedores</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="">
                                <h3>Soporte</h3>
                                <div class="d-flex flex-column">
                                    <a href="" class="link-light text-decoration-none">Preguntas frecuentes</a>
                                    <a href="" class="link-light text-decoration-none">Contacto</a>
                                    <a href="" class="link-light text-decoration-none">Privacidad</a>
                                    <a href="" class="link-light text-decoration-none">Términos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="">
                                <h3>Subscribete</h3>
                                <p>
                                    Obtén las últimas noticias y actualizaciones de Te Invito, totalmente gratis.
                                </p>
                                <form action="#" method="post" target="_blank" class="">
                                    <input name="email" placeholder="Correo electrónico" required="required"
                                        type="email" class="form-control text-center">
                                    <div class="mt-2">
                                        <button class="btn btn-secondary-ti w-100">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                            Subscribirme
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    @yield('scripts')
</body>

</html>
