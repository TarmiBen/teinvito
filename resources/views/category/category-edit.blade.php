@extends ('layouts.users.category-functions')

@section('title', 'Editar categoria')

@section('contenido')

  <div class="content content-components bg-gray-1">
      
        <section id="Section1"> 

          <form action="{{ route('category.edit', ['id' => $categoria->id]) }}" method="post" data-parsley-validate="" novalidate="" >


          <div class="d-flex justify-content-between align-items-center">
            <H2 class="df-title">Inserta los datos a editar</H2>
            <button type="submit" class="btn icon ion-md-add-circle-outline btn btn-outline-success ">    Editar</button>
          </div>

          
          @method("PUT")
          @csrf
            <div class="input-group mg-b-10">
              {{-- <select class="custom-select" placeholder="Categoria" aria-label="categoria" name="category_id" id="category_id" aria-describedby="basic-addon1" required>
                <option selected>Selecciona una categoria</option>
                @foreach ($fathercategorias as $fathercategoria)
                <option value="{{ $fathercategoria->id }}" @if ($fathercategoria->id == $fathercategoria->id) selected @endif>{{ $fathercategoria->name }}</option>
                @endforeach
              </select> --}}
              <select id="select2" class="js-example-basic-single form-control" style="width: 100%;" wire:model="category_id" name="category_id" required>
                <option value="">Selecciona una categoria</option>
                @foreach($fathercategorias as $fathercategoria)
                  <option value="{{ $fathercategoria->id }}" @if ($fathercategoria->id == $fathercategoria->id) selected @endif>{{ $fathercategoria->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="input-group mg-b-10">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Nombre</span>
              </div>
              <input type="text" class="form-control" placeholder="Nombre" aria-label="nombre" name="name" id="name"aria-describedby="basic-addon1" value="{{$categoria->name}}" required>
              
            </div>
            <br>
          </form>
          <a href="{{route('category')}}" class="btn btn-outline-info icon typcn typcn-arrow-back-outline">  Regresar</a>
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

      </div><!-- container -->
</div><!-- content -->


@section('js')

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   

  <script>

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

