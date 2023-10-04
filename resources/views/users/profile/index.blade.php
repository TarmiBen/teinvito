@extends('layouts.users.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold m-0">
                    Editar perfil
                </h2>
                <div class="">
                    <a href="{{route('profile.edit', Auth::user()->id)}}" class="btn btn-outline-primary">
                        Editar Información
                    </a>
                </div>
            </div>

            @include('alerts.alerts')

            <div class="card mt-3">
                <div class="card-body">
                    <div class="text-secondary">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-auto p-0 d-flex flex-column">
                                    <img src="https://picsum.photos/85/85" alt="" class="rounded-4 border border-4 border-light" style="width:100px; height:100px;">
                                </div>
                                <div class="col-auto ms-2 d-flex flex-column justify-content-start">
                                    <div class="fs-4 fw-bold text-quaternary-ti">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <div>
                                        {{ Auth::user()->email }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="name" class="form-label">Nombre:</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" disabled>
                        </div>
                        <div class="mt-3">
                            <label for="email" class="form-label">Correo:</label>
                            <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
