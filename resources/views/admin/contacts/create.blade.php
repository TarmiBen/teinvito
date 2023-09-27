@extends('layouts.users.app')
@section('content')
<div class="row mt-4">
    <div class="stretch-card">
        <div class="card">
            <div class="card-body">
            <form action="{{ route('admin.contacts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @include('layouts.users.alert')
                    <div class="col-12 col-sm-6 mt-3">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
                    </div>
                    <div class="col-12 col-sm-6 mt-3">
                        <label for="lastname">Apellido:</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Apellido" value="{{ old('lastname') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="email">Email:</label>
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="phone">Celular:</label>
                        <input type="text" name="phone" class="form-control" placeholder="Teléfono" value="{{ old('phone') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="telephone">Telefono:</label>
                        <input type="text" name="telephone" class="form-control" placeholder="Telefono" value="{{ old('telephone') }}">
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mt-3 mt-sm-0">
                        <label for="company_id">Compañia:</label>
                        <select name="company_id" id="company_id" class="form-control">
                            <option value="">Selecciona una opción</option>
                            @foreach ($UserProviders as $UserProvider)
                                <option value="{{ $UserProvider->company_id }}">{{ $UserProvider->company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection