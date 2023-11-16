@extends('layouts.users.app')

@section('title', 'Editar Dirección')

@section('content')
    <form action="{{ route('admin.addresses.update', $address) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row justify-content-between align-items-center mb-3">
            <h3 class="col-auto m-0">Datos de la dirección</h3>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">
                    <i data-feather="plus-square"></i>
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
                            <div class="col-12 col-sm-6  mt-3">
                                <label for="company_id">Compañia:</label>
                                <select name="company_id" id="company_id" class="form-control">
                                    @foreach ($UserProviders as $UserProvider)
                                        <option value="{{ $UserProvider->company_id }}">{{ $UserProvider->company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="name">Nombre de la Sucursal u Oficina:</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Nombre de la Sucursal u Oficina EJ: Sucursal toluca"
                                    value="{{ $address->name }}">
                            </div>
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="street">Calle:</label>
                                <input type="text" name="street" class="form-control" placeholder="Calle"
                                    value="{{ $address->street }}">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="int">Numero Interior:</label>
                                <input type="text" name="int" class="form-control" placeholder="Numero Interior"
                                    value="{{ $address->int }}">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="ext">Numero Exterior:</label>
                                <input type="text" name="ext" class="form-control" placeholder="Numero Exterior"
                                    value="{{ $address->ext }}">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="cp">Codigo Postal:</label>
                                <input type="text" name="cp" class="form-control" placeholder="Codigo Postal"
                                    value="{{ $address->cp }}">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="colony">Colonia:</label>
                                <input type="text" name="colony" class="form-control" placeholder="Colonia"
                                    value="{{ $address->colony }}">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="city">Ciudad:</label>
                                <input type="text" name="city" class="form-control" placeholder="Ciudad"
                                    value="{{ $address->city }}">
                            </div>

                            <div class="col-12 col-sm-6 mt-3">
                                <label for="state">Estado:</label>
                                <input type="text" name="state" class="form-control" placeholder="Estado"
                                    value="{{ $address->state }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
