@extends ('layouts.users.category-functions')
{{-- Extiende una plantilla llamada 'layouts.users.category-functions' --}}

@section('title', 'Editar categoria') {{-- Define el título de la página --}}

@section('contenido') {{-- Abre la sección 'contenido' --}}

<div class="content content-components bg-gray-1"> {{-- Abre un contenedor para el diseño --}}

    <section id="Section1"> {{-- Inicia una sección --}}

        <form action="{{ route('category.edit', ['id' => $categoria->id]) }}" method="post" data-parsley-validate=""
            novalidate="" class="form-edit"> {{-- Formulario de edición de categoría

            <div class="d-flex justify-content-between align-items-center">  {{-- Encabezado del formulario --}}
            <H2 class="df-title">Inserta los datos a editar</H2> {{-- Título del formulario --}}
            <button type="submit" class="btn icon ion-md-add-circle-outline btn btn-outline-success ">Editar</button>
            {{-- Botón de edición --}}
</div>

@method("PUT") {{-- Método HTTP para la edición de datos --}}
@csrf {{-- Token CSRF para la seguridad del formulario --}}

<div class="input-group mg-b-10"> {{-- Campo de selección de categoría padre --}}
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Categoria</span>
    </div>
    <select class="custom-select" placeholder="Categoria" aria-label="categoria" name="category_id" id="category_id"
        aria-describedby="basic-addon1" required>
        <option selected>Selecciona una categoria</option> {{-- Opción predeterminada --}}
        @foreach ($fathercategorias as $fathercategoria)
        <option value="{{ $fathercategoria->id }}" @if ($fathercategoria->id == $fathercategoria->id) selected
            @endif>{{ $fathercategoria->name }}</option> {{-- Opciones de categoría padre --}}
        @endforeach
    </select>
</div>

<div class="input-group mg-b-10"> {{-- Campo de entrada para el nombre de la categoría --}}
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Nombre</span>
    </div>
    <input type="text" class="form-control" placeholder="Nombre" aria-label="nombre" name="name" id="name"
        aria-describedby="basic-addon1" value="{{$categoria->name}}" required>
</div>
<br>
</form>
<a href="{{route('category')}}" class="btn btn-outline-info icon typcn typcn-arrow-back-outline">Regresar</a>
{{-- Enlace para regresar a la página de categorías --}}
</section>

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

</div><!-- container -->
</div><!-- content -->

@endsection {{-- Cierra la sección 'contenido' y la vista --}}



@section('js')

<script src="https:cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- Incluye el script de la biblioteca "SweetAlert2" para mostrar alertas --}}
<script> 
    // Script que muestra una alerta de confirmación al intentar eliminar una categoría
    $('.form-edit').submit(function(e){
    e.preventDefault();

    Swal.fire({
    title: 'Estas seguro?',
    text: "Podrás editar esto despues",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Editar!',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
    
    if (result.value) {
        this.submit();
    }
    })
    });
</script>

@endsection
