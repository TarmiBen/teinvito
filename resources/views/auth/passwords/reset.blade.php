@extends('layouts.users.app')

@section('title', 'Restablecer Contraseña')

@section('content')

    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-6 d-none d-lg-flex px-5 bg-primary-ti flex-column justify-content-center align-items-center">
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
                            Completa los campos para restablecer tu contraseña.
                        </span>
                        <div class="mt-5">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="row">
                                    <div class="col-12">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>

                                        <input id="email" type="email"
                                            class="py-3 form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>

                                        <input id="password" type="password"
                                            class="py-3 form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="password-confirm"
                                            class="form-label">{{ __('Confirm Password') }}</label>

                                        <input id="password-confirm" type="password" class=" py-3form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button type="submit" class="btn btn-secondary-ti w-100 p-2">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                        <button type="submit" class="btn btn-primary-ti w-100 p-2">
                                            {{ __('Reset Password') }}
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
