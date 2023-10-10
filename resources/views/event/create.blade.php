@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('content')
<form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">New Event</h3>
        <h2 class="col-auto">{{$userId}} {{$userName}}</h2>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">
                <i data-feather="plus-square"></i>
                Crear
            </button>
        </div>
    </div>

    <div class="row mt-4">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" name="user_id" value="{{$userId}}">
                    <div class="col-auto mt-4">
                        <label for="name">UserInvitedId</label>
                        <select name="user_invited_id">
                            <option value="">Selection</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name.''.$user->id}}</option>
                            @endforeach
                        </select>
                        @error('user_invited_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-auto mt-4">
                    <label for="name">InvitationId</label>
                        <select name="invitation_id">
                            <option value="">Selection</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        @error('invitation_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-auto mt-4">
                        <label for="name">Type</label>
                        <select name="type" id="new_type" >
                            <option value="">Selection</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="new">New</option>
                        </select>
                        <input type="text" name="type" id="type" placeholder="ingresar una nueva" style="display: none;" value="{{old('type')}}">
                        @error('type')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-auto mt-4">
                        <label for="name">CeremonyDate</label>
                        <input type="date" name="ceremony_date" value="{{old('ceremony_date')}}">
                        @error('ceremony_date')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-auto mt-4">
                        <label for="name">EventDate</label>
                        <input type="date" name="event_date" value="{{old('event_date')}}">
                        @error('event_date')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-auto mt-4">
                        <label for="name">Title</label>
                        <input type="text" name="title" value="{{old('title')}}">
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#new_type').change(function() {
            if ($(this).val() === 'new') {
                $('#type').show();
                $('#new_type').hide();
            } else {
                $('#type').hide();
                $('#new_type').show();
            }
        });
    });
</script>

@endsection
