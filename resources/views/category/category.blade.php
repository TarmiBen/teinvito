@extends('layouts.users.category-functions') {{-- Extiende una plantilla llamada 'layouts.users.category-functions' --}}

@section('title','category') {{-- Define el título de la página --}}

@section('contenido') {{--Abre la sección 'contenido'--}}

<div class="content content-components bg-gray-1"> {{-- Abre un contenedor con clases el diseño --}}

    <div class="d-flex justify-content-between align-items-center">
        {{--Muestra un encabezado con título y botón de registro --}}
        <h2 class="df-title">Categorias</h2>
        <a href="{{route('category.create')}}" class="btn icon ion-md-add-circle-outline btn btn-outline-success ">
            Registrar nueva categoria</a>
    </div>

    <section id="Section1"> {{-- Inicia una sección" --}}

        <div class="card shadow-lg mt-4">
            <div class="card-body">
                @livewire('category-component') {{-- Incluye un componente Livewire llamado 'category-component' --}}
            </div>
        </div>
    </section>
</div>
@endsection {{-- Cierra la sección 'contenido' y la vista --}}

@section('js') {{-- Abre la sección 'js' para agregar scripts JavaScript --}}
<!-- alertas -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{--  Incluye el script de la biblioteca "SweetAlert2" para mostrar alertas --}}


@if(session('delete') == 'ok')
{{--  Si existe una sesión con la clave 'delete' igual a 'ok', muestra una alerta de éxito --}}
<script>
    Swal.fire(
        'Eliminado!',
        'Su categoria ha sido eliminado.',
        'success'
    )

</script>
@endif

<script>
    // Script que muestra una alerta de confirmación al intentar eliminar una categoría
    $('.form-delete').submit(function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Estas seguro?',
            text: "No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borralo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                // Swal.fire(
                // 'Deleted!',
                // 'Your file has been deleted.',
                // 'success'
                // )

                this.submit();
            }
        })
    });

</script>

@if(session('add') == 'ok') {{-- Si existe una sesión con la clave 'add' igual a 'ok', muestra una alerta de éxito --}}
<script>
    Swal.fire(
        'Registrado!',
        'Su catergoria ha sido registrada.',
        'success'
    )

</script>
@endif

@if(session('edit') == 'ok')
{{-- Si existe una sesión con la clave 'edit' igual a 'ok', muestra una alerta de éxito --}}
<script>
    Swal.fire(
        'Editado!',
        'Su catergoria ha sido editada.',
        'success'
    )

</script>
@endif
@endsection {{-- Cierra la sección 'js' --}}
