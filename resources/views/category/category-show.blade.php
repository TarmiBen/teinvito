@extends('layouts.users.app')
@section('content')

<div class="row justify-content-between align-items-center mb-3">
    <h3 class="col-auto">Mostrar categoria</h3>
    <div class="col-auto d-flex">
        <a href="{{ route('category') }}" class="btn btn-outline-info">
            Regresar
        </a>    
    </div>
</div>

<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th>ID</th>
            <th>Categoria</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>{{ $category->id }}</td> {{-- Muestra el ID de la categoría --}}
            <td>
                @if ($category->Category) 

                    {{ $category->Category->name }}
                    {{-- Muestra el nombre de la categoría asociada --}}
                @else
                    Esta es una categoría padre
                    {{-- Muestra un mensaje si no hay categoría asociada --}}
                @endif
            </td>
            <td>{{ $category->name }}</td> {{-- Muestra el nombre de la categoría --}}
        </tr>
    </tbody>
</table>

@endsection
