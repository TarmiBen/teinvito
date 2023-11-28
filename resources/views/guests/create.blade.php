@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('title', 'Nuevo Invitado')
@section('content')
    <div>
        <form action="{{ route('guests.store') }}" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-between align-items-center mb-3">
                <h3 class="col-auto m-0"></h3>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">
                        <i class="fa-regular fa-square-plus"></i>
                        Guardar
                    </button>
                </div>
            </div>
    
            @include('layouts.users.alert')
    
            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <h3> Nuevo Invitado</h3>

                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Titulo" value="{{ old('name') }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" placeholder="Titulo" value="{{ old('lastname') }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="phone">Phone</label>
                                    <input maxlength="10" type="number" name="phone" class="form-control" placeholder="Titulo" value="{{ old('phone') }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="phone">Phone</label>
                                    <input maxlength="10" type="number" name="phone" class="form-control" placeholder="Titulo" value="{{ old('phone') }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Titulo" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </form>
    </div>
@endsection
