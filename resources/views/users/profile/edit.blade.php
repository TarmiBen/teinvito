@extends('layouts.users.app')
@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{route('profile.update', Auth::user()->id)}}" method="POST">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold m-0">Editar Información de Perfil</h2>
                <div class="">
                    <a href="{{ route('profile.index') }}" class="btn btn-outline-danger">Cancelar</a>
                    <button type="button" class="btn btn-outline-primary" id="changePasswordBtn">Cambiar Contraseña</button>
                    <button class="btn btn-success">Guardar</button>
                </div>
            </div>

            @include('alerts.alerts')

            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{route('profile.update', Auth::user()->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mt-3">
                            <label for="name" class="form-label">Nombre:</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="lastname" class="form-label">Apellidos</label>
                            <input type="text" name="lastname" value="{{ Auth::user()->lastname }}" class="form-control">
                        </div>
                        <div class="mt-3 d-none" id="passwordField">
                            <label for="password" class="form-label">Nueva Contraseña:</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mt-3 d-none" id="confirmationPasswordField">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </form>
    </div>
</div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const changePasswordBtn = document.getElementById('changePasswordBtn');
            const passwordField = document.getElementById('passwordField');
            const confirmationPasswordField = document.getElementById('confirmationPasswordField');
            
            changePasswordBtn.addEventListener('click', function() {
                passwordField.classList.remove('d-none');
                passwordField.classList.toggle('d-block');
                confirmationPasswordField.classList.remove('d-none');
                confirmationPasswordField.classList.toggle('d-block');
            });
        });
    </script>
@endsection
