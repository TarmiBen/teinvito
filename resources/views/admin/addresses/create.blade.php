@extends('layouts.users.app')

@section('title', 'Crear Dirección')

@section('content')
    <div>
        <form action="{{ route('admin.addresses.store') }}" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-between align-items-center mb-3">
                <h3 class="col-auto m-0">Datos de la dirección</h3>
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
                                <div class="col-12 col-sm-6  mt-3">
                                    <label for="company_id"><span class="text-danger">*</span>Compañia:</label>
                                    <select name="company_id" id="company_id" class="form-select">
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($UserProviders as $UserProvider)
                                            <option value="{{ $UserProvider->company_id }}"
                                                @if ($selectedAddress && $selectedAddress->id == $UserProvider->company_id) selected @endif>
                                                {{ $UserProvider->company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="name"><span class="text-danger">*</span>Nombre de la Sucursal u Oficina:</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Nombre de la Sucursal u Oficina EJ: Sucursal toluca"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 mt-3">
                                    <label for="street"><span class="text-danger">*</span>Calle:</label>
                                    <input type="text" name="street" class="form-control" placeholder="Calle"
                                        value="{{ old('street') }}">
                                </div>

                                <div class="col-12 col-sm-6 col-md-3 mt-3">
                                    <label for="int">Numero Interior:</label>
                                    <input type="text" name="int" class="form-control" placeholder="Numero Interior"
                                        value="{{ old('int') }}">
                                </div>

                                <div class="col-12 col-sm-6 col-md-3 mt-3">
                                    <label for="ext"><span class="text-danger">*</span>Numero Exterior:</label>
                                    <input type="text" name="ext" class="form-control" placeholder="Numero Exterior"
                                        value="{{ old('ext') }}">
                                </div>

                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="cp"><span class="text-danger">*</span>Codigo Postal:</label>
                                    <input type="text" name="cp" class="form-control" placeholder="Codigo Postal" id="cp" value="{{ old('cp') }}">
                                </div>

                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="colony"><span class="text-danger">*</span>Colonia:</label>
                                    <select class="form-select" name="colony" id="colonia">
                                        <option value="{{ old('colonia') }}">Selecciona una opción</option>
                                    </select>
                                </div>

                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="city"><span class="text-danger">*</span>Ciudad:</label>
                                    <input type="text" name="city" class="form-control" placeholder="Ciudad"
                                        value="{{ old('city') }}" id="municipio">
                                </div>

                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="state"><span class="text-danger">*</span>Estado:</label>
                                    <input type="text" name="state" class="form-control" placeholder="Estado"  id="estado" value="{{ old('state') }}">
                                </div>

                                <div class="col-12 d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-success">
                                        <i data-feather="plus-square"></i>
                                        Guardar
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/postalcode.js"> </script>
@endsection
