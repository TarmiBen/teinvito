@extends('layouts.users.app')

@section('title', 'Editar Contacto')

@section('content')
    <form action="{{ route('admin.contacts.update', $contact) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-between align-items-center mb-3">
            <h3 class="col-auto m-0">Datos de contacto</h3>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">
                    <i class="fa-regular fa-square-plus"></i>
                    Guardar
                </button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @include('layouts.users.alert')
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" class="form-control" placeholder="Nombre"
                                    value="{{ $contact->name }}">
                            </div>
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="lastname">Apellido:</label>
                                <input type="text" name="lastname" class="form-control" placeholder="Apellido"
                                    value="{{ $contact->lastname }}">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="email">Email:</label>
                                <input type="text" name="email" class="form-control" placeholder="Email"
                                    value="{{ $contact->email }}">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="phone">Celular:</label>
                                <input type="text" name="phone" class="form-control" placeholder="Teléfono"
                                    value="{{ $contact->phone }}">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="telephone">Telefono:</label>
                                <input type="text" name="telephone" class="form-control" placeholder="Telefono"
                                    value="{{ $contact->telephone }}">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3 mt-3 mt-sm-0">
                                <label for="company_id">Compañia:</label>
                                <select name="company_id" id="company_id" class="form-control">
                                    @foreach ($UserProviders as $UserProvider)
                                        <option value="{{ $UserProvider->company_id }}">{{ $UserProvider->company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
