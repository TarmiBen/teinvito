@extends('layouts.category.category-functions')

@section('title','category')

@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
@endsection

@section('contenido')

<div class="content content-components bg-gray-1">

<div class="d-flex justify-content-between align-items-center">
  <h2 class="df-title">Categorias</h2>
  <a href="{{route('category.create')}}" class="btn icon ion-md-add-circle-outline btn btn-outline-success ">  Registrar nueva categoria</a>
</div>


<section id="Section1">

<div class="card shadow-lg mt-4">
<div class="card-body">
<table class="table table-bordered table-striped text-center " id="cat"> 
    <thead>
      <tr>
        <th>ID</th>
        <th>Categoria</th>
        <th>Nombre</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categorias as $categoria)
      <tr>              
        <td>{{$categoria->id}}</td>
        <td>
          @if ($categoria->Category)
              {{ $categoria->Category->name }}
          @else
              Esta es una categoría padre
          @endif
        </td>
        <td>{{$categoria->name}}</td>
        <td>
          <form action="{{url('category/'.$categoria->id)}}" method="post" class="btn-group form-delete form-edit form-add text-center">
            @method("DELETE")
            @csrf
            <a type="button" class="btn btn-outline-warning far fa-eye" href="{{url('category/'.$categoria->id. '/category-show')}}"></a>
            <a type="button" class="btn btn-outline-info far fa-edit" href="{{url('category/'.$categoria->id. '/category-edit')}}"></a>
            <button type="submit" class="btn btn-outline-danger typcn typcn-delete  "></button>   
          </form>   
        </td>          
      </tr>   
      @endforeach         
    </tbody>
  </table>
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

<!-- datatable -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
<script>
  $(document).ready( function () {
    $('#cat').DataTable({
      responsive: true,
      autoWith:false,
    });
} );
</script>

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