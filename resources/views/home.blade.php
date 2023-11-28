@extends ('layouts.users.app')
@section('title', 'Home')
@section('content')
<div>
    <h3>
        !Hola {{ Auth::user()->name }}!
    </h3>    
        <div>
            @include('layouts.users.alert')
        </div>
    <hr>

    <h4 class="fw-bold mt-4">
        Dashboard
    </h4>

    <section class="mt-4">
        <div class="card border-0 shadow">
            <div class="card-header bg-tertiary-ti">
                <div class="d-flex align-items-center">
                    <div class="m-0 fs-5 text-white">
                        Información de la última invitación
                    </div>
                    <div class="ms-auto">
                        <a href="#" class="btn btn-secondary-ti">
                            Editar
                        </a>
                        <a href="#" class="btn btn-primary-ti">
                            Ver
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col fs-5">
                        Anfritrion(es): <span class="fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="row justify-content-center rounded-3">
                            <div class="col-8 border fs-5 text-center">
                                <div class="">
                                    Faltan
                                </div>
                                <div class="fs-3">
                                    <span class="fw-bold">10:00:00</span>
                                </div>
                            </div>
                            <div class="col-8 border text-center text-muted">
                                Fecha: <span class="fw-bold">10/10/2021</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 justify-content-center">
    	            <div class="col-auto text-center fs-5">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-tertiary-ti text-white">
                                Invitaciones creadas
                            </div>
                            <div class="card-body fw-bold">
                                10
                            </div>
                        </div>
                    </div>
                    <div class="col-auto text-center fs-5">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-tertiary-ti text-white">
                                Invitados
                            </div>
                            <div class="card-body fw-bold">
                                42
                            </div>
                        </div>
                    </div>
                    <div class="col-auto text-center fs-5">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-tertiary-ti text-white">
                                <div class="row">
                                    <div class="col">
                                        Aceptados
                                    </div>
                                    <div class="col">
                                        Pendientes
                                    </div>
                                    <div class="col">
                                        Rechazados
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="d-flex fw-bold w-100">
                                    <div class="col bg-success-subtle py-3">
                                        5
                                    </div>
                                    <div class="col bg-warning-subtle py-3">
                                        4
                                    </div>
                                    <div class="col bg-danger-subtle py-3">
                                        1
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="fs-5 fw-bold">
                        Lista de Invitados
                    </div>
                    <div class="mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Familia
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Telefono
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Asistencia
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($guests as $guest)
                                    <tr>
                                        <td>
                                            {{ $guest->lastname }}
                                        </td>
                                        <td>
                                            {{ $guest->name }}
                                        </td>
                                        <td>
                                            {{ $guest->phone }}
                                        </td>
                                        <td>
                                            {{ $guest->email }}
                                        </td>
                                        @if($guest->status == 1)
                                            <td>
                                                <span class="badge bg-success">
                                                    Asistiré
                                                </span>
                                            </td>
                                        @elseif($guest->status == 2)
                                            <td>
                                                <span class="badge bg-warning">
                                                    Por Confirmar
                                                </span>
                                            </td>
                                        @elseif($guest->status == 3)
                                            <td>
                                                <span class="badge bg-danger">
                                                    No Asistiré
                                                </span>
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
    </section>
</div>
@endsection
