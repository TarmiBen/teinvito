@extends('layouts.users.app')
@section('content')
<div class="row justify-content-between align-items-center">
    <h3 class="col-auto">Detalle del Contacto</h3>
    <div class="col-auto d-flex">
        <form action="{{ route('admin.companies.destroy', $contact) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{route('admin.companies.create')}}" class="btn btn-outline-success">
                <i data-feather="plus-square"></i>
                Nuevo Contacto
            </a>
            <a href="{{ route('admin.companies.edit', $contact) }}" class="btn btn-warning">
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
                        {{ $contact->name }} {{ $contact->lastname }}
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-auto card-subtitle mb-3 text-muted fw-bold">
                            En la compañia: <a href="{{ route('admin.companies.show', $contact->company) }}">{{ $contact->company->name }}</a>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="mb-3">Contacto</h4>
                        <div class="mt-2 text-muted d-flex align-items-center">
                            <span class="fw-bold">
                                <i data-feather="mail" class="mr-2"></i>
                                Correo:
                            </span>
                            <a class="ms-2" href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                        </div>
                        <div class="mt-2 text-muted d-flex align-items-center">
                            <span class="fw-bold">
                                <i data-feather="phone" class="mr-2"></i>
                                Telefono:
                            </span>
                            <a class="ms-2" href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection