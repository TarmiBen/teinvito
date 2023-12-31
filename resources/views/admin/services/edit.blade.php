@extends('layouts.users.app')
@section('title', 'Editar Servicio')
@section('content')
<div>
    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
        <div class="row justify-content-between align-items-center mb-3">
            <h3 class="col-auto m-0"></h3>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">
                    <i data-feather="plus-square"></i>
                    Guardar
                </button>
            </div>
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
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="name"><span class="text-danger">*</span>Nombre del Servicio:</label>
                                <input type="text" name="name" class="form-control" placeholder="Nombre de la Compañia" value="{{$service->name}}">
                            </div>
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="category_id"><span class="text-danger">*</span>Selecciona una Categoria:</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="company_id"><span class="text-danger">*</span>Selecciona una Subcategoria:</label>
                                <select name="company_id" id="company_id" class="form-control">
                                    @foreach ($companies as $companie)
                                        <option value="{{ $companie->company_id }}">{{ $companie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="description_small"><span class="text-danger">*</span>Descripción corta del Servicio:</label>
                                <textarea name="description_small" class="form-control" placeholder="Descripción">{{ $service->description_small }}</textarea>
                            </div>
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="keywords"><span class="text-danger">*</span>Palabras Clave del Servicio:</label>
                                <textarea name="keywords" class="form-control" placeholder="Descripción">{{ $service->keywords }}</textarea>
                            </div>
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="img_src"><span class="text-danger">*</span>Imagen del Servicio:</label>
                                <input type="file" name="img_src" class="form-control" placeholder="Imagen" value="{{ old('img_src') }}">
                            </div>
                            <div class="col-12 col-sm-12 mt-3">
                                <label for="description_large"><span class="text-danger">*</span>Descripción completa del Servicio:</label>
                                <textarea name="description_large" class="form-control" placeholder="Descripción">{{ $service->description_large }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
</div>

@endsection