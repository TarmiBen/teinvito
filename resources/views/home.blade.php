@extends ('layouts.users.app')

@section('content')
<div>
    <h3>
        !Hola {{ Auth::user()->name }}!
    </h3>    

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
                        <a href="{{ route('admin.invitations.create', $lastInvitation->id ?? null) }}" class="btn btn-secondary-ti">
                            Editar
                        </a>
                        @if ($lastInvitation)
                            <a href="{{ route('admin.invitations.show', $lastInvitation->id ) }}" class="btn btn-primary-ti">Ver</a>
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
                                {{ $guests['accepted'] + $guests['pending'] + $guests['rejected'] }}
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
                                        {{ $guests['accepted'] }}
                                    </div>
                                    <div class="col bg-warning-subtle py-3">
                                        {{ $guests['pending'] }}
                                    </div>
                                    <div class="col bg-danger-subtle py-3">
                                        {{ $guests['rejected'] }}
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
                                        No. Invitados
                                    </th>
                                    <th>
                                        No. Mesa
                                    </th>
                                    <th>
                                        Invitación
                                    </th>
                                    <th>
                                        Asistencia
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Santoyo
                                    </td>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        A2
                                    </td>
                                    <td>
                                        http://invitacion.com
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            Aceptado
                                        </span>
                                    </td>
                                    <td>
                                        ...
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Santoyo
                                    </td>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        A2
                                    </td>
                                    <td>
                                        http://invitacion.com
                                    </td>
                                    <td>
                                        <span class="badge bg-warning">
                                            Pendiente
                                        </span>
                                    </td>
                                    <td>
                                        ...
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Santoyo
                                    </td>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        A2
                                    </td>
                                    <td>
                                        http://invitacion.com
                                    </td>
                                    <td>
                                        <span class="badge bg-danger">
                                            Rechazado
                                        </span>
                                    </td>
                                    <td>
                                        ...
                                    </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

