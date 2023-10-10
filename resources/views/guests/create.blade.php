@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('content')
    <form action="{{ route('guests.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between align-items-center">
            <h3 class="col-auto">New Guests</h3>
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
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{old('name')}}">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-auto mt-4">
                            <label for="name">Last Name</label>
                            <input type="text" name="lastname" value="{{old('lastname')}}">
                            @error('lastname')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-auto mt-4">
                            <label for="name">Phone</label>
                            <input maxlength="10" type="number" name="phone" placeholder="ingresa tu telefono" value="{{old('phone')}}">
                            @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-auto mt-4">
                            <label for="name">Email</label>
                            <input type="text" name="email" placeholder="ingresa tu Email" value="{{old('email')}}">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-auto mt-4">
                            <label for="name">Number</label>
                            <input type="number" name="number" id="number" placeholder="ingresa la cantidad de invitados" value="{{old('number')}}">
                            @error('number')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
