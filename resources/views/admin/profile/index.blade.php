@extends('layouts.users.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-auto p-0 d-flex flex-column">
                            <img src="https://picsum.photos/85/85" alt="" class="rounded-circle border border-4 border-light" style="width:120px; height:120px;">
                        </div>
                        <div class="col-auto ms-2 d-flex flex-column justify-content-start text-center text-sm-start">
                            <div class="fs-3 fw-bold text-quaternary-ti">
                                {{ Auth::guard('adminlogin')->check() ? Auth::guard('adminlogin')->user()->name : Auth::user()->name }}
                            </div>
                            <div class="fs-4">
                                {{ Auth::guard('adminlogin')->check() ? Auth::guard('adminlogin')->user()->email : Auth::user()->email }}
                            </div>
                        <div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('alerts.alerts')

    <div class="d-flex justify-content-between align-items-center mt-4">
        <h2 class="fw-bold m-0">
            Editar perfil
        </h2>
        <div class="">
            <a href="{{route('admin.profile.edit', Auth::guard('adminlogin')->check() ? Auth::guard('adminlogin')->user()->id : Auth::user()->id)}}" class="btn btn-outline-primary">
                <i class="fas fa-edit"></i>
                Editar Información
            </a>
        </div>
    </div>
    
    <div class="card mt-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-12 col-sm-6">
                    <label for="name" class="form-label">Nombre(s)</label>
                    <input type="text" class="form-control" id="name" value="{{ Auth::guard('adminlogin')->check() ? Auth::guard('adminlogin')->user()->name : Auth::user()->name }}" disabled>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" value="{{ Auth::guard('adminlogin')->check() ? Auth::guard('adminlogin')->user()->email : Auth::user()->email }}" disabled>
                </div>
            </div>
        </div>
    </div>
    
@endsection
