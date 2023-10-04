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
    <title>Document</title>
</head>
<body>
<div>
    <form action="{{ route('event.update',$event) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row justify-content-between align-items-center">
            <h3 class="col-auto">Edit Event</h3>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">
                    <i data-feather="plus-square"></i>
                    Update
                </button>
            </div>
        </div>

        <div class="row mt-4">
            <div class="stretch-card">
                <div class="card">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="col-auto mt-4">
                            <label for="name">UserInvitedId</label>
                            <select name="user_invited_id">
                                <option value="{{$event->user_invited_id}}">{{$event->user_invited_id}}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-auto mt-4">
                            <label for="name">InvitationId</label>
                            <select name="invitation_id">
                                <option value="{{$event->invitation_id}}">{{$event->invitation_id}}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-auto mt-4">
                            <label for="name">Type</label>
                            <input type="text" name="type" value="{{$event->type}}">
                        </div>
                        <div class="col-auto mt-4">
                            <label for="name">CeremonyDate</label>
                            <input type="datetime" name="ceremony_date" value="{{$event->ceremony_date}}">
                        </div>
                        <div class="col-auto mt-4">
                            <label for="name">EventDate</label>
                            <input type="datetime" name="event_date" value="{{$event->event_date}}">
                        </div>
                        <div class="col-auto mt-4">
                            <label for="name">Title</label>
                            <input type="text" name="title" value="{{$event->title}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</body>
</html>


@endsection
