@extends('layouts.users.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-auto p-0 d-flex flex-column">
                            <img src="https://picsum.photos/85/85" alt="" class="rounded-circle border border-4 border-light" style="width:120px; height:120px;">
                        </div>
                        <div class="col-auto ms-2 d-flex flex-column justify-content-start text-center text-sm-start">
                            <div class="fs-3 fw-bold text-quaternary-ti">
                                {{ $user->name }} {{ $user->lastname }}
                            </div>
                            <div class="fs-4">
                                {{ $user->email }}
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <label for="name" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" id="name" value="{{ $user->name }}" disabled>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="lastname" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="lastname" value="{{ $user->lastname }}" disabled>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="phone" value="{{ $user->phone }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row justify-content-center align-items-center">
            <div class="col-auto ms-2 d-flex flex-column justify-content-start text-center text-sm-start">
                <div class="fs-3 fw-bold text-quaternary-ti">
                    Eventos del Usuario
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                    <table id="events" class="w-100 table table-striped">
                        <thead>
                        <tr>
                            <th data-priority="id">Id</th>
                            <th data-priority="user_id">Creador</th>
                            <th data-priority="user_invited_id">Usuario Invitado</th>
                            <th data-priority="tittle">Nombre del Evento</th>
                            <th data-priority="type">Tipo de Evento</th>
                            <th data-priority="ceremony_date">Fecha de Ceremonia</th>
                            <th data-priority="event_date">Fecha del Evento</th>
                            <th data-priority="actions">Acciones</th>
                        </tr>
                        </thead>
                        <tbody enctype="multipart/form-data">
                        @foreach($events as $event)
                            <tr>
                                <td>{{$event->id}}</td>
                                <td>{{ $event->User->name }}</td>
                                <td>{{ $event->user_invited_id }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->type }}</td>
                                <td>{{ carbon\Carbon::parse($event->ceremony_date)->format('d-m-Y H:i:s') }}</td>
                                <td>{{ carbon\Carbon::parse($event->event_date)->format('d-m-Y H:i:s') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">

                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.inv.show',$event->User->id ) }}" class="btn btn-icon btn-warning">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                        <a> {{$event->User->id}}</a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


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

    <div class="card-body">
        <div class="row justify-content-center align-items-center">
            <div class="col-auto ms-2 d-flex flex-column justify-content-start text-center text-sm-start">
                <div class="fs-3 fw-bold text-quaternary-ti">
                    Lista de Invitados
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                    <table id="events" class="w-100 table table-striped">
                        <thead>
                        <tr>
                            <th data-priority="id">Id</th>
                            <th data-priority="user_id">Hash</th>
                            <th data-priority="user_invited_id">InvitationId</th>
                            <th data-priority="invitation_id">Name</th>
                            <th data-priority="type">LastName</th>
                            <th data-priority="ceremony_date">Phone</th>
                            <th data-priority="ceremony_date">Email</th>
                            <th data-priority="event_date">Number</th>
                            <th data-priority="tittle">Status</th>
                            <th data-priority="actions">Actions</th>
                        </tr>
                        </thead>
                        <tbody enctype="multipart/form-data">
                        @foreach($guests as $guest)
                            <tr>
                                <td>{{$guest->id}}</td>
                                <td>{{ $guest->hash }}</td>
                                <td>{{$guest->invitation_id}}</td>
                                <td>{{ $guest->name }}</td>
                                <td>{{ $guest->lastname }}</td>
                                <td>{{ $guest->phone }}</td>
                                <td>{{ $guest->email }}</td>
                                <td>{{ $guest->number }}</td>
                                <td>{{ $guest->status }}</td>
                                <td>
                                    <form action="{{ route('guests.destroy', $guest) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('guests.show', $guest) }}" class="btn btn-icon btn-warning">
                                            <i class="fa-regular fa-eye"></i>
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
    </div>




@endsection
