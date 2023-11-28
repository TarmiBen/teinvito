@extends('layouts.users.app')
@section('title', 'Detalle del Servicio')
@section('content')
<div class="row justify-content-between align-items-center">
    <h3 class="col-auto">Detalle del Servicio</h3>
    <div class="col-auto d-flex">
        <form action="{{ route('admin.services.destroy', $service) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{route('admin.services.create')}}" class="btn btn-outline-success">
                <i data-feather="plus-square"></i>
                Nuevo Servicio
            </a>
            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-warning">
                <i data-feather="edit"></i>
                Editar
            </a>
            <button type="submit" class="btn btn-danger">
                <i data-feather="trash"></i>
                Eliminar
            </button>
        </form>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12 col-lg-6">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title fs-3 text-primary">
                        Nombre del Servicio:
                        {{ $service->name }} 
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-auto card-subtitle mb-3 text-muted fw-bold">
                            de la compañia: <a href="{{ route('admin.services.show', $service->company) }}">{{ $service->company->name }}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-auto card-subtitle mb-3 text-muted fw-bold">
                            categoria: <a href="{{ route('admin.services.show', $service->Category) }}">{{ $service->Category->name }}</a>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="mb-3">Información del Servicio</h4>
                        <div class="mt-2 text-muted d-flex align-items-center">
                            <span class="fw-bold">
                                Descripción Corta:
                            </span>
                            <span class="ms-2">{{ $service->description_small }}</span>
                        </div>
                        <div class="mt-2 text-muted d-flex align-items-center">
                            <span class="fw-bold">
                                Descripción Completa:
                            </span>
                            <span class="ms-2">{{ $service->description_large }}</span>
                        </div>
                        <div class="mt-2 text-muted d-flex align-items-center">
                            <span class="fw-bold">
                                Palabras Clave:
                            </span>
                            <span class="ms-2">{{ $service->keywords }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection