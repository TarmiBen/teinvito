@extends('layouts.admin.app')
@section('content')
    <div class="card-body">
        <div class="row justify-content-center align-items-center">
            <div class="col-auto ms-2 d-flex flex-column justify-content-start text-center text-sm-start">
                <div class="fs-3 fw-bold text-quaternary-ti">
                    Lista de Invitaciones
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table id="products" class="w-100 table table-striped">
                        <thead>
                        <tr>
                            <th>No. Invitacion</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($invitations as $invitation)
                            <tr>
                                <td>{{ $invitation->id }}</td>
                                <td>{{ $invitation->User->name }}</td>
                                <td>{{ $invitation->User->email }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
