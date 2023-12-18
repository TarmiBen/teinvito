@extends('layouts.users.app')
@section('title', 'Detalle del Paquete de Servicio')
@section('content')
<div class="row justify-content-between align-items-center">
    <h3 class="col-auto">Detalle del Paquete de Servicio</h3>
    <div class="col-auto d-flex">
        <form action="{{ route('admin.services.destroy', $servicePackage) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{route('admin.servicePackages.create')}}" class="btn btn-outline-success">
                <i data-feather="plus-square"></i>
                Nuevo Paquete
            </a>
            <a href="{{ route('admin.servicePackages.create', ['servicePackageId' => $servicePackage->id]) }}" class="btn btn-warning">
                <i data-feather="edit"></i>
                Editar
            </a>
        </form>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12 col-lg-6">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title fs-3 text-primary">
                        Nombre del Paquete:
                        {{ $servicePackage->name }} 
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-auto card-subtitle mb-3 text-muted fw-bold">
                            Paquete del Servicio: <a href="{{ route('admin.services.show', $servicePackage->service) }}">{{ $servicePackage->service->name }}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-auto card-subtitle mb-3 text-muted fw-bold">
                            de la compañia: <a href="{{ route('companies.show', $servicePackage->service->Company) }}">{{ $servicePackage->service->Company->name }}</a>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="mb-3">Información del Servicio</h4>
                        <div class="mt-2 text-muted d-flex align-items-center">
                            <span class="fw-bold">
                                Descripción:
                            </span>
                            <span class="ms-2">{{ $servicePackage->description }}</span>
                        </div>
                        <div class="mt-2 text-muted d-flex align-items-center">
                            <span class="fw-bold">
                                Precio:
                            </span>
                            <span class="ms-2">${{ $servicePackage->price }}</span>
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
                            Galería de Imagenes
                        </div>
                    </div>
                    <div class="mt-3">
                        <table id="accounts" class="w-100 table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Servicio</th>
                                    <th>Imagen</th>
                                    <th>Título</th>
                                    <th>Texto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Gallerys as $Gallery)
                                        <tr>
                                            <td></td>
                                            <td>{{ isset($Gallery->id) ? $Gallery->id : 'N/A' }}</td>
                                            <td>{{ isset($Gallery->ServicePackage->name) ? $Gallery->ServicePackage->name : 'N/A' }}</td>
                                            <td><img src="{{ asset('storage/'.$Gallery->src) }}" alt="" width="100px"></td>
                                            <td>{{ isset($Gallery->tittle) ? $Gallery->tittle : 'N/A' }}</td>
                                            <td>{{ isset($Gallery->text) ? $Gallery->text : 'N/A' }}</td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection