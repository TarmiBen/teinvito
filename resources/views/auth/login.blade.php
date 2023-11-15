@extends('layouts.users.app')

@section('title', 'Iniciar Sesion')

@section('content')
<div class="container-fluid">
    <div class="row vh-100">
        <div class="col-6 d-none d-lg-flex px-5 bg-tertiary-ti flex-column justify-content-center align-items-center">
            <span class="h1 fw-bold text-center text-white">
                Cada evento comienza de manera excepcional con una invitación digital asombrosa.
            </span>    
            <img src="/assets/img/login/login.svg" alt="" class="img-fluid">
        </div>
        <div class="col-12 col-lg-6 px-0 px-lg-5 py-5 d-flex justify-content-center align-items-center">
            <div class="container px-0 px-xl-5">
                <div class="px-5">
                    <h1 class="fw-bold">
                        Inicia Sesion en Te Invito
                    </h1>
                    <span class="h5 text-muted">
                        Nos alegra verte de nuevo, inicia sesion con tu cuenta.
                    </span>
                    <div class="mt-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="email" class="form-label">
                                        Correo Electrónico
                                    </label>
                                    <input id="email" type="email" class="py-3 form-control @error('email') is-invalid @enderror" name="email" placeholder="" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                                    <input id="password" type="password" class="py-3 form-control @error('password') is-invalid @enderror" name="password" placeholder="" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 d-flex justify-content-between mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            Recuerdame
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            ¿Olvidaste tu contraseña?
                                        </a>
                                    @endif
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-tertiary-ti w-100 p-2">
                                        Iniciar Sesion
                                    </button>
                                </div>
                            </div>
                        </form>

                        <hr class="my-4">

                        <!-- <div class="text-center">
                            O Inicia Sesion con
                        </div>

                        <div class="mt-3">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-outline-tertiary-ti w-100 p-2">
                                        <i class="fab fa-google me-2"></i>
                                        Google
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-outline-tertiary-ti w-100 p-2">
                                        <i class="fab fa-facebook-f me-2"></i>
                                        Facebook
                                    </button>
                                </div>
                            </div>
                        </div> -->
                        <div class="mt-4 text-center">
                            ¿No tienes cuenta?
                            <a href="{{ route('register') }}" class="text-decoration-none">
                                Registrate
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
