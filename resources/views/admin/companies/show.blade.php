@extends('layouts.users.app')

@section('title', 'Detalle de la Compañia')

@section('content')
<div class="row justify-content-between align-items-center">
    <h3 class="col-auto">Detalle de la Compañia</h3>
    <div class="col-auto d-flex">
        <form action="{{ route('admin.companies.destroy', $company) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-info">
                <i class="fa-regular fa-edit"></i>
                Editar
            </a>
            <button type="submit" class="btn btn-danger">
                <i class="fa-regular fa-trash-alt"></i>
                Eliminar
            </button>
        </form>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="profile-box text-center">
                            <div class="cover-photo" style="background-image: url('{{ asset($company->cover) }}');">
                            </div>
                            <div class="profile-photo-container">
                                <img src="{{ asset($company->logo) }}" alt="Profile Photo" class="profile-photo img-fluid">
                            </div>
                            <h3 class="mt-5 mb-1">{{ $company->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <h4 class="mb-3">Contacto</h4>
                    <div class="mt-2 text-muted d-flex align-items-center">
                        <span class="fw-bold">
                            <i class="fa-regular fa-envelope"></i>
                            Correo:
                        </span>
                        <a class="ms-2" href="mailto:{{ $company->email }}">{{ $company->email }}</a>
                    </div>
                    <div class="mt-2 text-muted d-flex align-items-center">
                        <span class="fw-bold">
                            <i class="fa-solid fa-phone"></i>
                            Teléfono:
                        </span>
                        <a class="ms-2" href="tel:{{ $company->phone }}">{{ $company->phone }}</a>
                    </div>
                </div>
                <div class="mt-5">
                    <h4 class="mb-2">Dirección Principal</h4>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                            <span class="fw-bold">
                                <span class="text-muted">N° Int:</span> {{ isset($principalAddress->int) ? $principalAddress->int : 'N/A' }}
                            </span>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                            <span class="fw-bold">
                                <span class="text-muted">N° Ext</span> {{ isset($principalAddress->ext) ? $principalAddress->ext : 'N/A' }}
                            </span>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                            <span class="fw-bold">
                                <span class="text-muted">CP:</span> {{ isset($principalAddress->cp) ? $principalAddress->cp : 'N/A' }}
                            </span>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                            <span class="fw-bold">
                                <span class="text-muted">Colonia:</span> {{ isset($principalAddress->colony) ? $principalAddress->colony : 'N/A' }}
                            </span>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                            <span class="fw-bold">
                                <span class="text-muted">Calle:</span> {{ isset($principalAddress->street) ? $principalAddress->street : 'N/A' }}
                            </span>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                            <span class="fw-bold">
                                <span class="text-muted">Estado:</span> {{ isset($principalAddress->state) ? $principalAddress->state : 'N/A' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 mt-3 mt-lg-0">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto card-title fs-4 text-primary">
                        Contactos
                    </div>
                    <div class="col-auto d-flex">
                        <a href="{{ route('admin.contacts.create', ['company_id' => $company->id]) }}" class="btn btn-outline-primary">
                            <i class="fa-regular fa-square-plus"></i>
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
                                <th>Acciones</th>
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
                                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-icon btn-warning">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.contacts.edit', $contact) }}" class="btn btn-icon btn-info">
                                                    <i class="fa-regular fa-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-icon btn-danger">
                                                    <i class="fa-regular fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto card-title fs-4 text-primary">
                                    Direcciones
                                </div>
                                <div class="col-auto d-flex">
                                    <a href="{{ route('admin.addresses.create', ['company_id' => $company->id]) }}" class="btn btn-outline-primary">
                                        <i class="fa-regular fa-square-plus"></i>
                                        Nueva Dirección
                                    </a>
                                </div>
                            </div>
                            <div class="mt-3">
                                <table id="accounts" class="w-100 table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Compañia</th>
                                            <th>Nombre de la Sucursal u Oficina</th>
                                            <th>Dirreción</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($addresses as $addresse)
                                                <tr>
                                                    @if($addresse->priority == 1)
                                                    <td class="text-primary">{{ isset($addresse->id) ? $addresse->id : 'N/A' }}</td>
                                                    <td class="text-primary">{{ isset($addresse->Company->name) ? $addresse->Company->name : 'N/A' }}</td>
                                                    <td class="text-primary">{{ isset($addresse->name) ? $addresse->name : 'N/A' }}</td>
                                                    <td class="text-primary">{{ isset($addresse->street) ? $addresse->street : 'N/A' }}, N° Ext: {{ isset($addresse->ext) ? $addresse->ext : '' }}, N° Int:
                                                        {{ isset($addresse->int) ? $addresse->int : '' }}, {{ isset($addresse->colony) ? $addresse->colony : '' }}, 
                                                        {{ isset($addresse->cp) ? $addresse->cp : '' }}, {{ isset($addresse->state) ? $addresse->state : '' }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.contacts.show', $addresse) }}" class="btn btn-sm btn-success">Ver</a>
                                                        <a href="{{ route('admin.contacts.edit', $addresse) }}" class="btn btn-sm btn-primary">Editar</a>
                                                        <form action="{{ route('admin.contacts.destroy', $addresse) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                        </form>
                                                    </td>   
                                                    @else
                                                    <td>{{ isset($addresse->id) ? $addresse->id : 'N/A' }}</td>
                                                    <td>{{ isset($addresse->Company->name) ? $addresse->Company->name : 'N/A' }}</td>
                                                    <td>{{ isset($addresse->name) ? $addresse->name : 'N/A' }}</td>
                                                    <td>{{ isset($addresse->street) ? $addresse->street : 'N/A' }}, N° Ext: {{ isset($addresse->ext) ? $addresse->ext : '' }}, N° Int:
                                                        {{ isset($addresse->int) ? $addresse->int : '' }}, {{ isset($addresse->colony) ? $addresse->colony : '' }}, 
                                                        {{ isset($addresse->cp) ? $addresse->cp : '' }}, {{ isset($addresse->state) ? $addresse->state : '' }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.contacts.destroy', $addresse) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('admin.contacts.show', $addresse) }}" class="btn btn-icon btn-warning">
                                                                <i class="fa-regular fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('admin.contacts.edit', $addresse) }}" class="btn btn-icon btn-primary">
                                                                <i class="fa-regular fa-edit"></i>
                                                            </a>
                                                            <button type="submit" class="btn btn-icon btn-danger">
                                                                <i class="fa-regular fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    @endif
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
    </div>
</div>
@endsection