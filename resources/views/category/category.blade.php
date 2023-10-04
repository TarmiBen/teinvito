@extends('layouts.users.category-functions')

@section('title','category')

@section('contenido')

<div class="content content-components bg-gray-1">

<div class="d-flex justify-content-between align-items-center">
  <h2 class="df-title">Categorias</h2>
  <a href="{{route('category.create')}}" class="btn icon ion-md-add-circle-outline btn btn-outline-success ">  Registrar nueva categoria</a>
</div>


<section id="Section1">
  
<div class="card shadow-lg mt-4">
<div class="">
  @livewire('category-component')
  @livewireScripts()
</div>

</div>
</section>   

<footer class="content-footer">
  <div>
    <span>&copy;  </span>
    <span>Made by <a href=""></a>benito</span>
  </div>
  <div>
    <nav class="nav">
      
    </nav>
  </div>
</footer>
</div>
@endsection

@section('js')


<!-- alertas -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if(session('delete') == 'ok')
  <script>
    Swal.fire(
      'Eliminado!',
      'Su categoria ha sido eliminado.',
      'success'
      )
  </script>
  @endif  

  <script>

    $('.form-delete').submit(function(e){
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
    <script>
      Swal.fire(
        'Editado!',
        'Su catergoria ha sido editada.',
        'success'
        )
    </script>
    @endif 
@endsection