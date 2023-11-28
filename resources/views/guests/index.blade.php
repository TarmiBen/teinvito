@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('title', 'Invitaciones')
@section('content')
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Invitados</h3>
        <div class="col-auto">
            <a href="{{ route('guests.create') }}" class="btn btn-outline-success">
                <i data-feather="plus-square"></i>
                Nuevo Invitado
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
