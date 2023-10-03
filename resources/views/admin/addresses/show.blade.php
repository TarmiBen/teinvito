@extends('layouts.users.app')
@section('content')
<div class="row justify-content-between align-items-center">
    <h3 class="col-auto">Detalle de la Dirección</h3>
    <div class="col-auto d-flex">
        <form action="{{ route('admin.addresses.destroy', $address) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{route('admin.addresses.create')}}" class="btn btn-outline-success">
                <i data-feather="plus-square"></i>
                Nuevo Contacto
            </a>
            <a href="{{ route('admin.addresses.edit', $address) }}" class="btn btn-warning">
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
                        {{ $address->name }} {{ $address->lastname }}
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-auto card-subtitle mb-3 text-muted fw-bold">
                            Dirección de la compañia: <a href="{{ route('admin.companies.show', $address->company) }}">{{ $address->company->name }}</a>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h4 class="mb-2">Dirección Principal</h4>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">N° Int:</span> {{ isset($address->int) ? $address->int : 'N/A' }}
                                </span>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">N° Ext</span> {{ isset($address->ext) ? $address->ext : 'N/A' }}
                                </span>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">CP:</span> {{ isset($address->cp) ? $address->cp : 'N/A' }}
                                </span>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">Colonia:</span> {{ isset($address->colony) ? $address->colony : 'N/A' }}
                                </span>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">Calle:</span> {{ isset($address->street) ? $address->street : 'N/A' }}
                                </span>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">Estado:</span> {{ isset($address->state) ? $address->state : 'N/A' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection