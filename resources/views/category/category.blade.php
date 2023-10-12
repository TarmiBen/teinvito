@extends('layouts.users.app')
@section('content')
@livewireStyles()
@include('layouts.users.alert')
    @livewire('category-component')
@livewireScripts()
@endsection


@section('scripts') 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> {{-- Script de la biblioteca "SweetAlert2" --}}
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
  @if(session('add') == 'ok')
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
@endsection
