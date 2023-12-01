@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('title', 'Nuevo Invitado')
@section('content')
    <div>
        <form action="{{ route('guests.store') }}" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-between align-items-center mb-3">
                <h3 class="col-auto m-0">Nuevo Invitado</h3>
            </div>
    
            @include('layouts.users.alert')
            <div class="mt-4">
                <div class="alert alert-primary" role="alert">
                    Todos los campos marcados con ( <span class="text-danger">*</span> ) son necesarios para su registro.
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="name"><span class="text-danger">*</span>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Titulo" value="{{ old('name') }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="lastname"><span class="text-danger">*</span>Last Name</label>
                                    <input type="text" name="lastname" class="form-control" placeholder="Titulo" value="{{ old('lastname') }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="phone"><span class="text-danger">*</span>Phone</label>
                                    <input maxlength="10" type="number" name="phone" class="form-control" placeholder="Titulo" value="{{ old('phone') }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="email"><span class="text-danger">*</span>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Titulo" value="{{ old('email') }}">
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-regular fa-square-plus"></i>
                                        Guardar
                                    </button>
                                </div>
                
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </form>
    </div>
@endsection
