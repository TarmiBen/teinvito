<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                            <a class="nav-link text-white mx-lg-2 active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mx-lg-2" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mx-lg-2" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mx-lg-2" href="#">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mx-lg-2" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="#" class="login-button me-4 text-white">Login</a>
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
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum
                                    voluptates. Quisquam, voluptatum voluptates.
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
                                <h3>Solutions</h3>
                                <div class="d-flex flex-column">
                                    <a href="" class="link-light text-decoration-none ">Marketing</a>
                                    <a href="" class="link-light text-decoration-none ">Analytics</a>
                                    <a href="" class="link-light text-decoration-none ">Commerce</a>
                                    <a href="" class="link-light text-decoration-none ">Insights</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="">
                                <h3>Support</h3>
                                <div class="d-flex flex-column">
                                    <a href="" class="link-light text-decoration-none ">Pricing</a>
                                    <a href="" class="link-light text-decoration-none ">Documentation</a>
                                    <a href="" class="link-light text-decoration-none ">Guides</a>
                                    <a href="" class="link-light text-decoration-none ">API Status</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="">
                                <h3>Subscribe</h3>
                                <p>Subscribe to our newsletter for the latest updates</p>
                                <form action="#" method="post" target="_blank" class="">
                                    <input name="email" placeholder="Email address" required="required" type="email"
                                        class="form-control text-center">
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
