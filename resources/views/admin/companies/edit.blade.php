@extends('layouts.users.app')
@section('content')
<div class="row mt-4">
    <div class="stretch-card">
        <div class="card">
            <div class="card-body">
            <form action="{{ route('admin.companies.update', $company) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    @include('layouts.users.alert')
                    <div class="col-12 col-sm-6 mt-3">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{$company->name}}">
                    </div>
                    <div class="col-12 col-sm-6 mt-3">
                        <label for="phone">Teléfono:</label>
                        <input type="text" name="phone" class="form-control" placeholder="Teléfono" value="{{$company->phone}}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="email">Email:</label>
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{$company->email}}">
                    </div>
                    
                    <div class="col-12 col-sm-6 mt-3">
                        <label for="rfc">RFC:</label>
                        <input type="text" name="rfc" class="form-control" placeholder="RFC" value="{{$company->rfc}}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="description">Descripción:</label>
                        <textarea name="description" class="form-control" placeholder="Descripción">{{$company->description}}</textarea>
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="logo">Logo:</label>
                        <input type="file" name="logo" class="form-control" placeholder="Logo" value="{{$company->logo}}">
                    </div>

                    <div class="col-12 col-sm-6 mt-3">
                        <label for="cover">Cover:</label>
                        <input type="file" name="cover" class="form-control" placeholder="Cover" value="{{$company->cover}}">
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