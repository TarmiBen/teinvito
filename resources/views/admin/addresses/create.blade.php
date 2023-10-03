@extends('layouts.users.app')
@section('content')
<div class="row mt-4">
    <div class="stretch-card">
        <div class="card">
            <div class="card-body">
            <form action="{{ route('admin.addresses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @include('layouts.users.alert')
                    <div class="col-12 col-sm-6  mt-3">
                        <label for="company_id">Compañia:</label>
                        <select name="company_id" id="company_id" class="form-select">
                            <option value="">Selecciona una opción</option>
                            @foreach ($UserProviders as $UserProvider)
                            <option value="{{ $UserProvider->company_id }}" @if ($selectedAddress && $selectedAddress->id == $UserProvider->company_id) selected @endif>{{ $UserProvider->company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 mt-3">
                        <label for="name">Nombre de la Sucursal u Oficina:</label>
                        <input type="text" name="name" class="form-control" placeholder="Nombre de la Sucursal u Oficina EJ: Sucursal toluca" value="{{ old('name') }}">
                    </div>
                    <div class="col-12 col-sm-6 mt-3">
                        <label for="street">Calle:</label>
                        <input type="text" name="street" class="form-control" placeholder="Calle" value="{{ old('street') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="int">Numero Interior:</label>
                        <input type="text" name="int" class="form-control" placeholder="Numero Interior" value="{{ old('int') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="ext">Numero Exterior:</label>
                        <input type="text" name="ext" class="form-control" placeholder="Numero Exterior" value="{{ old('ext') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="cp">Codigo Postal:</label>
                        <input type="text" name="cp" class="form-control" placeholder="Codigo Postal" value="{{ old('cp') }}">
                    </div>
                    
                    <div class="col-12 col-sm-6 mt-3">
                        <label for="colony">Colonia:</label>
                        <input type="text" name="colony" class="form-control" placeholder="Colonia" value="{{ old('colony') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="city">Ciudad:</label>
                        <input type="text" name="city" class="form-control" placeholder="Ciudad" value="{{ old('city') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="state">Estado:</label>
                        <input type="text" name="state" class="form-control" placeholder="Estado" value="{{ old('state') }}">
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