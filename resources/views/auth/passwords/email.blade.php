@extends('layouts.users.app')

@section('title', 'Restablecer Contraseña')

@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-6 d-none d-lg-flex px-5 bg-secondary-ti flex-column justify-content-center align-items-center">
                <span class="h1 fw-bold text-center text-dark">
                    Cada evento comienza de manera excepcional con una invitación digital asombrosa.
                </span>
                <img src="/assets/img/login/login.svg" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-lg-6 px-0 px-lg-5 py-5 d-flex justify-content-center align-items-center">
                <div class="container px-0 px-xl-5">
                    <div class="px-5">
                        <h1 class="fw-bold">
                            Restablecer Contraseña
                        </h1>
                        <span class="h5 text-muted">
                            Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
                        </span>
                        <div class="mt-5">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        <input id="email" type="email"
                                            class="py-3 form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button type="submit" class="btn btn-secondary-ti w-100 p-2">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
