@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('title', 'Eventos')
@section('content')
<div class="row justify-content-between align-items-center">
    <h3 class="col-auto">Events</h3>
    <div class="col-auto">
        <a href="{{ route('event.create') }}" class="btn btn-outline-success">
            <i data-feather="plus-square"></i>
            New Event
        </a>
    </div>
</div>

<div class="mt-4">
    @include('layouts.users.alert')
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
                        <th data-priority="type">Type</th>
                        <th data-priority="ceremony_date">CeremonyDate</th>
                        <th data-priority="event_date">EventDate</th>
                        <th data-priority="actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody enctype="multipart/form-data">
                    @foreach($events as $event)
                        <tr>
                            <td>{{$event->id}}</td>
                            <td>{{ $event->User->name }}</td>
                            @if( $event->user_invited_id == null))
                                <td>NA</td>
                            @else
                                <td>{{ $event->UserInvited->name }} - {{ $event->UserInvited->email }}</td>
                            @endif
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->type }}</td>
                            <td>{{ carbon\Carbon::parse($event->ceremony_date)->format('d-m-Y') }}</td>
                            <td>{{ carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <form action="{{ route('event.destroy', $event) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <a href="{{ route('event.show', $event) }}" class="btn btn-icon btn-warning">
                                                <i class="fa-regular fa-eye"></i>
                                            </a>
                                            <a href="{{ route('event.edit', $event) }}" class="btn btn-icon btn-info">
                                                <i class="fa-regular fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-icon btn-danger">
                                                <i class="fa-regular fa-trash-alt"></i>
                                            </button>
                                    </form>
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
@endsection
