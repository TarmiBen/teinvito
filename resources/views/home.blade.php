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

        @if (Auth::user()->invitation->first() == null)
            <div class="alert alert-info alert-dismissible fade show d-flex align-items-center  justify-content-between"
                role="alert">
                <div>
                    <strong>¡No has creado ninguna invitación!</strong> Crea una invitación para poder ver el dashboard.
                </div>
                <a href="{{ route('invitations.create') }}" class="btn btn-quaternary-ti">
                    Crear invitación
                </a>
            </div>
        @else
            <section class="mt-4">
                <div class="card border-0 shadow">
                    <div class="card-header bg-tertiary-ti">
                        <div class="d-flex align-items-center">
                            <div class="m-0 fs-5 text-white">
                                Información de la última invitación
                            </div>
                            <div class="ms-auto">
                                <a href="{{ route('admin.invitations.create', $lastInvitation->id ?? null) }}"
                                    class="btn btn-secondary-ti">
                                    Editar
                                </a>
                                @if ($lastInvitation)
                                    <a href="{{ route('admin.invitations.show', $lastInvitation->id) }}"
                                        class="btn btn-primary-ti">Ver</a>
                                @else
                                    <a href="#" class="btn btn-primary-ti">Ver</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col fs-5">
                                Anfritrion(es): <span class="fw-bold">{{ $invitations['userName'] }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="row justify-content-center rounded-3">
                                    <div class="col-9 border fs-5 text-center">
                                        <div class="">
                                            Faltan
                                        </div>
                                        <div class="fs-3">
                                            <span class="fw-bold">Mucho</span>
                                        </div>
                                    </div>
                                    <div class="col-9 border text-center text-muted">
                                        Fecha: <span class="fw-bold">{{ $lastEventDate }}</span>
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
                                        {{ $invitations['invitationsCount'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-center fs-5">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-tertiary-ti text-white">
                                        Invitados
                                    </div>
                                    <div class="card-body fw-bold">
                                        {{ $guestCount['accepted'] + $guestCount['pending'] + $guestCount['rejected'] }}
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
                                                {{ $guestCount['accepted'] }}
                                            </div>
                                            <div class="col bg-warning-subtle py-3">
                                                {{ $guestCount['pending'] }}
                                            </div>
                                            <div class="col bg-danger-subtle py-3">
                                                {{ $guestCount['rejected'] }}
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
                                        @foreach ($guests as $guest)
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
                                                @if ($guest->status == 1)
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
        @endif

    </div>
@endsection
