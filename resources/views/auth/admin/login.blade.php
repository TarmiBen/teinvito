@extends('layouts.users.app')

@section('title', 'Iniciar Sesion')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row vh-100">
            <div
                class="col-12 col-lg-6 px-0 px-lg-5 py-5 d-flex justify-content-center align-items-center mx-auto">
                <div class="container px-0 px-xl-5">
                    <div class="px-5">
                        <div class="mt-5">
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <label for="email" class="form-label">
                                            Correo Electrónico
                                        </label>
                                        <input id="email" type="email"
                                            class="py-3 form-control @error('email') is-invalid @enderror" name="email"
                                            placeholder="" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus>
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
                                        <input id="password" type="password"
                                            class="py-3 form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 d-flex justify-content-between align-items-center  mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                Recuerdame
                                            </label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('admin.resetPassword') }}">
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

                            <div class="mt-4 text-center">
                                ¿No tienes cuenta?
                                <a href="{{ route('admin.register') }}" class="text-decoration-none fw-bold">
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
