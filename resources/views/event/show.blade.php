@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('content')

<div class="row justify-content-between align-items-center">
    <h3 class="col-auto">Detalle del Evento</h3>
    <div class="col-auto d-flex">
        <form action="{{ route('event.destroy', $event) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="btn-group">
                <a href="{{ route('event.create') }}" class="btn btn-outline-success">
                    <i data-feather="plus-square"></i>
                    New Event
                </a>
                <a href="{{ route('event.edit', $event) }}" class="btn btn-icon btn-info">
                    <i data-feather="edit">Edit</i>
                </a>
                <button type="submit" class="btn btn-icon btn-danger">
                    <i data-feather="trash">Delete</i>
                </button>
            </div>
        </form>
    </div>
</div>

@include('layouts.users.alert')

<div class="row mt-4">
    <div class="col-12">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title fs-3 text-primary">
                        <h1> {{$event->title}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-auto mt-4">
                            UserId: <span class="bg-light p-2 rounded-pill fw-bold">{{$event->users_id}}</span>
                        </div>
                        <div class="col-auto mt-4">
                            UserInvitedId: <span class="bg-light p-2 rounded-pill fw-bold">{{ $event->user_invited_id }}</span>
                        </div>
                        <div class="col-auto mt-4">
                            InvitationId: <span class="bg-light p-2 rounded-pill fw-bold">{{ $event->invitation_id }}</span>
                        </div>
                        <div class="col-auto mt-4">
                            Type: <span class="bg-light p-2 rounded-pill fw-bold">{{ $event->type }}</span>
                        </div>
                        <div class="col-auto mt-4">
                            CeremonyDate: <span class="bg-light p-2 rounded-pill fw-bold">{{ $event->ceremony_date }}</span>
                        </div>
                        <div class="col-auto mt-4">
                            EventDate: <span class="bg-light p-2 rounded-pill fw-bold">{{ $event->event_date }}</span>
                        </div>
                        <div class="col-auto mt-4">
                            Tittle: <span class="bg-light p-2 rounded-pill fw-bold">{{ $event->title }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
