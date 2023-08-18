@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{route('profile.update', Auth::user()->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-title border-bottom">
                        <div class="d-flex justify-content-between">
                            <h2 class="fw-bold">Editar Información de Perfil</h2>
                            <div class="">
                                <a href="{{ route('profile.index') }}" class="btn btn-outline-secondary">Regresar</a>
                                <button class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="name" class="form-label">Nombre:</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection