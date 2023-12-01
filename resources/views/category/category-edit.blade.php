@extends('layouts.users.app')

@section('title','Category-edit')

@section('content')

<form
    action="{{ route('category.edit', ['id' => $category->id]) }}"
    method="post" data-parsley-validate="" novalidate="" class="form-edit">
    {{-- Formulario de edición de categoría --}}
    <div class="row justify-content-between align-items-center mb-3">
        <h3 class="col-auto">Inserta los datos a editar</h3>
        <div class="col-auto d-flex">
            <a href="{{ route('category') }}" class="btn btn-outline-info">
                Regresar
            </a>
            <button type="submit" class="btn btn-success ms-2">
                Editar
            </button>
        </div>
    </div>
    <div class="mt-4">
        <div class="alert alert-primary" role="alert">
            Todos los campos marcados con ( <span class="text-danger">*</span> ) son necesarios para su registro.
        </div>
    </div>
    @method("PUT")
    @csrf
    <div class="input-group mg-b-10">
        <select id="select2" class="js-example-basic-single form-control" style="width: 100%;" wire:model="category_id"
            name="category_id" required>
            <option value="">Selecciona una categoria</option>
            @foreach($fathercategories as $fathercategory)
                <option value="{{ $fathercategory->id }}" @if ($fathercategory->id == $category->id)
                    {{'0'}} @endif>{{ $fathercategory->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="input-group mg-b-10">
        <input type="text" class="form-control" placeholder="Nombre" aria-label="nombre" name="name" id="name"
            aria-describedby="basic-addon1" value="{{ $category->name }}" required>
    </div>
    
</form>
@endsection