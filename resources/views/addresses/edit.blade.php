@extends('layouts.users.app')

@section('title', 'Editar Dirección')

@section('content')
    <form action="{{ route('addresses.update', $address) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row justify-content-between align-items-center mb-3">
            <h3 class="col-auto m-0">Datos de la dirección</h3>
        </div>
        <div class="mt-4">
            <div class="alert alert-primary" role="alert">
                Todos los campos marcados con ( <span class="text-danger">*</span> ) son necesarios para su registro.
            </div>
        </div>
        <div class="row mt-4">
            <div class="stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @include('layouts.users.alert')
                            <div class="col-12 col-sm-6  mt-3">
                                <label for="company_id"><span class="text-danger">*</span>Compañia:</label>
                                <select name="company_id" id="company_id" class="form-control">
                                    @foreach ($UserProviders as $UserProvider)
                                        <option value="{{ $UserProvider->company_id }}">{{ $UserProvider->company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="name"><span class="text-danger">*</span>Nombre de la Sucursal u Oficina:</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Nombre de la Sucursal u Oficina EJ: Sucursal toluca"
                                    value="{{ $address->name }}">
                            </div>
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="street"><span class="text-danger">*</span>Calle:</label>
                                <input type="text" name="street" class="form-control" placeholder="Calle"
                                    value="{{ $address->street }}">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="int">Numero Interior:</label>
                                <input type="text" name="int" class="form-control" placeholder="Numero Interior"
                                    value="{{ $address->int }}">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="ext"><span class="text-danger">*</span>Numero Exterior:</label>
                                <input type="text" name="ext" class="form-control" placeholder="Numero Exterior"
                                    value="{{ $address->ext }}">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="cp"><span class="text-danger">*</span>Codigo Postal:</label>
                                <input type="text" name="cp" class="form-control" placeholder="Codigo Postal"
                                    value="{{ $address->cp }}" id="cp">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="colony"><span class="text-danger">*</span> Colonia:</label>
                                <select class="form-control" name="colony" id="colonia">
                                    <option value="{{ $address->colony }}">{{ $address->colony }}</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="city"><span class="text-danger">*</span>Ciudad:</label>
                                <input type="text" name="city" class="form-control" placeholder="Ciudad"
                                    value="{{ $address->city }}">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="state"><span class="text-danger">*</span>Estado:</label>
                                <input type="text" name="state" class="form-control" placeholder="Estado"
                                    value="{{ $address->state }}" id="estado">
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
    </form>
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/postalcode.js"> </script>
@endsection
