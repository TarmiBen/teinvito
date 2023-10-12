@extends('layouts.users.app')
@section('content')

<form action="{{ route('category') }}" method="post" data-parsley-validate="" novalidate="">
    @csrf
    <div class="row justify-content-between align-items-center mb-3">
        <h3 class="col-auto">Registrar categoria nueva</h3>
        <div class="col-auto d-flex">
            <a href="{{ route('category') }}" class="btn btn-outline-info">
                Regresar
            </a>
            <button type="submit" class="btn btn-success ms-2">
                Guardar
            </button>     
        </div>
    </div>
    
    @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="input-group mg-b-10">
        <select id="select2" class="js-example-basic-single form-control" style="width: 100%;" wire:model="category_id"
            name="category_id" required>
            <option value="">Selecciona una categoria</option>
            @foreach($category as $categories)
                <option value="{{ $categories->id }}">{{ $categories->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="input-group mg-b-10">
        <input type="text" class="form-control" placeholder="Nombre" aria-label="nombre" name="name" id="name"
            aria-describedby="basic-addon1" required>
    </div>
</form>
@endsection