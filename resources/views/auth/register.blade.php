@extends('layouts.users.app')

@section('title', 'Registrate')

@section('content')
<div class="container-fluid">
    <div class="row vh-100">
        <div class="col-6 d-none d-lg-flex px-5 bg-quaternary-ti flex-column justify-content-center align-items-center">
            <span class="h1 fw-bold text-center text-white">
                Cada evento comienza de manera excepcional con una invitación digital asombrosa.
            </span>
            <img src="/assets/img/login/login.svg" alt="" class="img-fluid">
        </div>
        <div class="col-12 col-lg-6 px-0 px-lg-5 py-5 d-flex justify-content-center align-items-center">
            <div class="container px-0 px-xl-5">
                <div class="px-5">
                    <h1 class="fw-bold">
                        Registrate en Te Invito
                    </h1>
                    <span class="h5 text-muted">
                        Te agradecemos que nos dejes ser parte de tu evento.
                    </span>
                    <div class="mt-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <label for="name" class="form-label">
                                        Nombre
                                    </label>
                                    <input id="name" type="text" class="py-3 form-control @error('name') is-invalid @enderror" name="name" placeholder="" value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="email" class="form-label">
                                        Correo Electrónico
                                    </label>
                                    <input id="email" type="email" class="py-3 form-control @error('email') is-invalid @enderror" name="email" placeholder="" value="{{ old('email') }}" required autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="password" class="form-label">
                                        Contraseña
                                    </label>
                                    <input id="password" type="password" class="py-3 form-control @error('password') is-invalid @enderror" name="password" placeholder="" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="password-confirm" class="form-label">
                                        Confirmar Contraseña
                                    </label>
                                    <input id="password-confirm" type="password" class="py-3 form-control" name="password_confirmation" placeholder="" required>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-quaternary-ti w-100 p-2">
                                        Registrate
                                    </button>
                                </div>
                            </div>
                        </form>

                        <hr class="my-4">

                        <!-- <div class="text-center">
                            O Registrate con
                        </div>

                        <div class="mt-3">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-outline-quaternary-ti w-100 p-2">
                                        <i class="fab fa-google me-2"></i>
                                        Google
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-outline-quaternary-ti w-100 p-2">
                                        <i class="fab fa-facebook-f me-2"></i>
                                        Facebook
                                    </button>
                                </div>
                            </div>
                        </div> -->
                        <div class="mt-4 text-center">
                            ¿Ya tienes una cuenta?
                            <a href="{{ route('login') }}" class="text-decoration-none">
                                Inicia Sesion
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
