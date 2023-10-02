<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
=======
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertificación de correo</title>

    <!-- Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Styles CSS -->
    @vite(['resources/sass/app.scss'])
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-6 d-none d-lg-flex px-5 bg-tertiary-ti flex-column justify-content-center align-items-center">
                <span class="h1 fw-bold text-center text-white">
                    ¡ Tu seguridad es muy importante para nosotros !
                </span>
                <img src="/assets/img/login/login.svg" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-lg-6 px-0 px-lg-5 py-5 d-flex justify-content-center align-items-center">
                <div class="container px-0 px-xl-5">
                    <div class="d-flex flex-column text-center px-5">
                        <i class="fa-solid fa-envelope-open-text text-quaternary-ti" style="font-size:10rem"></i>

                        <div class="mt-4">
                            @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.
                            </div>
                            @endif

                            <p class="fs-3">
                                Antes de continuar, revise su correo electrónico para obtener un enlace de verificación.
                            </p>

                            <span class="fs-5 fw-bold">
                                Si no recibió el correo electrónico,
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link link-primary p-0 m-0 align-baseline">
                                        Haga clic aquí para solicitar otro
                                    </button>.
                                </form>
                            </span>
                        </div>

                        <div class="d-flex justify-content-center w-100 mt-4">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-flex justify-content-center">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Cerrar sesión
                                </button>
                            </form>
                        </div>
                    </div>
>>>>>>> develop
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</div>
@endsection
=======
</body>
</html>
>>>>>>> develop
