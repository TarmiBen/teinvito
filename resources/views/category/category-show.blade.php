@extends('layouts.users.category-functions') {{-- Extiende una plantilla llamada 'layouts.users.category-functions' --}}

@section('title', 'Mostrar categoria') {{-- Define el título de la página --}}

@section('contenido') {{--Abre la sección 'contenido'--}}

<div class="content content-components bg-gray-1 "> {{-- Abre un contenedor con clases para el diseño --}}

    <h1 class="df-title">Categorias</h1> {{--Muestra un encabezado con título --}}

    <section id="1"> {{-- Inicia una sección" --}}

        <table class="table table-bordered table-striped table-dark">
            {{-- Crea una tabla con clases CSS para el estilo --}}

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{$categoria->id}}</td> {{-- Muestra el ID de la categoría --}}
                    <td>
                        @if ($categoria->Category) {{-- Comprueba si existe una categoría asociada --}}
                        {{ $categoria->Category->name }} {{-- Muestra el nombre de la categoría asociada --}}
                        @else
                        Esta es una categoría padre {{-- Muestra un mensaje si no hay categoría asociada --}}
                        @endif
                    </td>
                    <td>{{$categoria->name}}</td> {{-- Muestra el nombre de la categoría --}}
                </tr>
            </tbody>
        </table>
    </section>
    <br>
    <br>
    <a href="{{route('category')}}" class="btn icon typcn typcn-arrow-back-outline btn btn-outline-info">Regresar</a>
    {{-- Muestra un enlace para regresar a la página de categorías --}}
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
@endsection {{-- Cierra la sección 'contenido' y la vista --}}
