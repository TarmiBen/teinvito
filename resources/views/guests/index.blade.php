@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('content')

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Event</title>
    </head>
    <body>
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Guests</h3>
        <div class="col-auto">
            <a href="{{ route('guests.create') }}" class="btn btn-outline-success">
                <i data-feather="plus-square"></i>
                New Guests
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
                                    <div class="d-flex justify-content-center align-items-center">
                                        <form action="{{ route('guests.destroy', $guest) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <a href="{{ route('guests.show', $guest) }}" class="btn btn-icon btn-primary">
                                                    <i data-feather="eye">Show</i>
                                                </a>
                                                <a href="{{ route('guests.edit', $guest) }}" class="btn btn-icon btn-info">
                                                    <i data-feather="edit">Update</i>
                                                </a>
                                                <button type="submit" class="btn btn-icon btn-danger">
                                                    <i data-feather="trash">Delete</i>
                                                </button>
                                            </div>
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

    </body>
    </html>

@endsection
