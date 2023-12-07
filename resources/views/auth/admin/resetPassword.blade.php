@extends('layouts.users.app')

@section('title', 'Restablecer Contraseña')

@section('content')
<div class="col-12 col-lg-6 px-0 px-lg-5 py-5 d-flex justify-content-center align-items-center mx-auto">
    <div class="container px-0 px-xl-5">
        <div class="px-5">
            <h1 class="fw-bold">
                Restablecer Contraseña
            </h1>
            <span class="h5 text-muted">
                Completa los campos para restablecer tu contraseña.
            </span>
            <div class="mt-5">
                <form method="POST" action="{{ route('admin.resetPassword') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary ">Restablecer Contraseña</button>
                </form>
                
                <hr class="my-4">
                                        
                <div class="mt-4 text-center">                    
                    ¿Ya tienes una cuenta?                       
                    <a href="{{ route('admin.login') }}" class="text-decoration-none fw-bold">                           
                        Inicia Sesion
                    </a>       
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
