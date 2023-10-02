@extends('layouts.users.app')
@section('content')
<div class="row justify-content-between align-items-center">
    <h3 class="col-auto">Detalle de la Compañia</h3>
    <div class="col-auto d-flex">
        <form action="{{ route('admin.companies.destroy', $company) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-warning">
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
                        {{ $company->name }}
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-auto card-subtitle mb-3 text-muted fw-bold">
                            logo: <img src="{{ asset(isset($company->logo) ? $company->logo : 'N/A') }}" width="100px">
                        </div>
                        <div class="col-12 col-sm-auto card-subtitle mb-3 text-muted fw-bold">
                            cover: <img src="{{ asset(isset($company->cover) ? $company->cover : 'N/A') }}" width="100px">
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="mb-3">Contacto</h4>
                        <div class="mt-2 text-muted d-flex align-items-center">
                            <span class="fw-bold">
                                <i data-feather="mail" class="mr-2"></i>
                                Correo:
                            </span>
                            <a class="ms-2" href="mailto:{{ $company->email }}">{{ $company->email }}</a>
                        </div>
                        <div class="mt-2 text-muted d-flex align-items-center">
                            <span class="fw-bold">
                                <i data-feather="phone" class="mr-2"></i>
                                Telefono:
                            </span>
                            <a class="ms-2" href="tel:{{ $company->phone }}">{{ $company->phone }}</a>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h4 class="mb-2">Dirección</h4>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">N° Int:</span> {{ isset($company->int) ? $company->int : 'N/A' }}
                                </span>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">N° Ext</span> {{ isset($company->ext) ? $company->ext : 'N/A' }}
                                </span>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">CP:</span> {{ isset($company->cp) ? $company->cp : 'N/A' }}
                                </span>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">Colonia:</span> {{ isset($company->colony) ? $company->colony : 'N/A' }}
                                </span>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">Calle:</span> {{ isset($company->street) ? $company->street : 'N/A' }}
                                </span>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">Estado:</span> {{ isset($company->state) ? $company->state : 'N/A' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 mt-3 mt-lg-0">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto card-title fs-4 text-primary">
                            Contactos
                        </div>
                        <div class="col-auto d-flex">
                            <a href="{{ route('admin.contacts.create') }}" class="btn btn-outline-success">
                                <i data-feather="plus-square"></i>
                                Nuevo Contacto
                            </a>
                        </div>
                    </div>
                    <div class="mt-3">
                        <table id="accounts" class="w-100 table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Compañia</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                        <tr>
                                            <td></td>
                                            <td>{{ isset($contact->id) ? $contact->id : 'N/A' }}</td>
                                            <td>{{ isset($contact->Company->name) ? $contact->Company->name : 'N/A' }}</td>
                                            <td>{{ isset($contact->name) ? $contact->name : 'N/A' }}</td>
                                            <td>{{ isset($contact->email) ? $contact->email : 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-success">Ver</a>
                                                <a href="{{ route('admin.contacts.edit', $contact) }}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection