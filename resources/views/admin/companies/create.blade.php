@extends('layouts.users.app')
@section('content')
<div class="row mt-4">
    <div class="stretch-card">
        <div class="card">
            <div class="card-body">
            <form action="{{ route('admin.companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @include('layouts.users.alert')
                    <div class="col-12 col-sm-6 mt-3">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
                    </div>
                    <div class="col-12 col-sm-6 mt-3">
                        <label for="phone">Teléfono:</label>
                        <input type="text" name="phone" class="form-control" placeholder="Teléfono" value="{{ old('phone') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="email">Email:</label>
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    
                    <div class="col-12 col-sm-6 mt-3">
                        <label for="rfc">RFC:</label>
                        <input type="text" name="rfc" class="form-control" placeholder="RFC" value="{{ old('rfc') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="description">Descripción:</label>
                        <input type="text" name="description" class="form-control" placeholder="Descripción" value="{{ old('description') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="logo">Logo:</label>
                        <input type="file" name="logo" class="form-control" placeholder="Logo" value="{{ old('logo') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="cover">Cover:</label>
                        <input type="file" name="cover" class="form-control" placeholder="Cover" value="{{ old('cover') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="cp">Codigo Postal:</label>
                        <input type="text" name="cp" class="form-control" placeholder="Codigo Postal" value="{{ old('cp') }}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="state">Estado:</label>
                        <input type="text" name="state" class="form-control" placeholder="Estado">
                    </div>
                    <div class="col-12 col-sm-6 mt-3">
                        <label for="street">Calle:</label>
                        <input type="text" name="street" class="form-control" placeholder="Calle">
                    </div>
                    
                    <div class="col-12 col-sm-6 mt-3">
                        <label for="int">Numero Interior:</label>
                        <input type="text" name="int" class="form-control" placeholder="Numero Interior">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="ext">Numero Exterior:</label>
                        <input type="text" name="ext" class="form-control" placeholder="Numero Exterior">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="colony">Colonia:</label>
                        <input type="text" name="colony" class="form-control" placeholder="Colonia">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="city">Ciudad:</label>
                        <input type="text" name="city" class="form-control" placeholder="Ciudad">
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