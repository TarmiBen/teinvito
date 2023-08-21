@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-3 d-none d-xl-block">
                <div class="card bg-dark">
                    <div class="card-body">
                        <a class="btn btn-light w-100">
                            <div class="d-flex px-2">
                                <i class="bi bi-window-dock"></i>
                                <span class="ms-2">Dashboard</span>
                            </div>
                        </a>
                        <a class="btn text-white w-100 mt-3">
                            <div class="d-flex px-2">
                                <i class="bi bi-window-dock"></i>
                                <span class="ms-2">menu 2</span>
                            </div>
                        </a>
                        <a class="btn text-white w-100 mt-3">
                            <div class="d-flex px-2">
                                <i class="bi bi-window-dock"></i>
                                <span class="ms-2">menu 3</span>
                            </div>
                        </a>
                    </div>
                </div>    
            </div>
            <div class="col-12 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title border-bottom">
                            <div class="">
                                <h2 class="fw-bold">
                                    Editar perfil
                                </h2>
                            </div>
                        </div>
                        @include('alerts.alerts')
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-3 text-secondary">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="text-secondary">
                                            Foto de perfil
                                        </div>    
                                        <div class="mt-2">
                                            <img src="https://picsum.photos/85/85" alt="" class="rounded-circle border border-4 border-light" style="width:100px; height:100px;">
                                        </div>
                                        <a href="" class="btn btn-outline-primary mt-3">
                                            Cambiar
                                        </a>
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
                                <div class="mt-3 d-flex justify-content-end">
                                    <a href="{{route('profile.edit', Auth::user()->id)}}" class="btn btn-outline-primary">
                                        Editar Información
                                    </a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="text-secondary">
                                            Plan actual:
                                        </div>    
                                        <div class="card col-8 bg-dark text-light">
                                            <div class="card-body">
                                                <div class="card-title border-bottom border-secondary">
                                                    <div class="row pb-2 align-items-center">
                                                        <div class="col-4">
                                                            <img src="https://picsum.photos/85/85" alt="" class="rounded-4" style="width:65px; height:65px;">
                                                        </div>
                                                        <div class="col-6">
                                                            <h5 class="fw-bold">Plan Gratuito</h5>
                                                            <div class="fw-bold">
                                                                $0.00
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="mt-1">
                                                        <i class="bi bi-check-circle-fill text-success"></i>
                                                        Beneficio 1
                                                    </div>
                                                    <div class="mt-1">
                                                        <i class="bi bi-check-circle-fill text-success"></i>
                                                        Beneficio 2
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
