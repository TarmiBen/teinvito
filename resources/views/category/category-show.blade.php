@extends('layouts.users.app')

@section('title', 'Mostrar categoria')

@section('content')

<div class="content content-components bg-gray-1 ">

    <h1 class="df-title">Categorias</h1>

    <section id="1">

        <table class="table table-bordered table-striped table-dark">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{$category->id}}</td> {{-- Muestra el ID de la categoría --}}
                    <td>
                        @if ($category->Category) {{-- Comprueba si existe una categoría asociada --}}
                        {{ $category->Category->name }} {{-- Muestra el nombre de la categoría asociada --}}
                        @else
                        Esta es una categoría padre {{-- Muestra un mensaje si no hay categoría asociada --}}
                        @endif
                    </td>
                    <td>{{$category->name}}</td> {{-- Muestra el nombre de la categoría --}}
                </tr>
            </tbody>
        </table>
    </section>
    <br>
    <br>
    <a href="{{route('category')}}" class="btn icon typcn typcn-arrow-back-outline btn btn-outline-info">Regresar</a>

    <footer class="content-footer">
        <div>
            <span>&copy; </span>
            <span>Made by <a href=""></a>benito</span>
        </div>
        <div>
            <nav class="nav">

            </nav>
        </div>
    </footer>
</div>
</div>
@endsection 
