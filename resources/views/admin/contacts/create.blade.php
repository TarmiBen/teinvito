@extends('layouts.users.app')

@section('title', 'Crear Contacto')

@section('content')
    <div>
        <form action="{{ route('admin.contacts.store') }}" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-between align-items-center mb-3">
                <h3 class="col-auto m-0">Datos de contacto</h3>
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
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="name">Nombre:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="lastname">Apellido:</label>
                                    <input type="text" name="lastname" class="form-control" placeholder="Apellido"
                                        value="{{ old('lastname') }}">
                                </div>

                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email"
                                        value="{{ old('email') }}">
                                </div>

                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="phone">Celular:</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Teléfono"
                                        value="{{ old('phone') }}">
                                </div>

                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="telephone">Teléfono:</label>
                                    <input type="text" name="telephone" class="form-control" placeholder="Telefono"
                                        value="{{ old('telephone') }}">
                                </div>

                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="company_id">Compañia:</label>
                                    <select name="company_id" id="company_id" class="form-control">
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($UserProviders as $UserProvider)
                                            <option value="{{ $UserProvider->company_id }}"
                                                @if ($selectedCompany && $selectedCompany->id == $UserProvider->company_id) selected @endif>
                                                {{ $UserProvider->company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
