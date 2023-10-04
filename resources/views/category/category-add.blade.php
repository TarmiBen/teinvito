@extends('layouts.users.category-functions')

@section('title','Agregar categoria')

@section('contenido')

<div class="content content-components bg-gray-1">

  <section id="section1">
    {{-- <form action="{{ route('category') }}" method="post" data-parsley-validate="" novalidate=""
      class="form-add">
      <div class="d-flex justify-content-between align-items-center">
        <h2 class="df-title">Registrar categoria nueva </h2>
        <button type="submit" class="btn icon ion-md-add-circle-outline btn btn-outline-success "> Registrar</button>
      </div>

      @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

      @endif

      @csrf

      <div class="input-group mg-b-10">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Categoria</span>
        </div>
        {{-- <select class="custom-select" placeholder="Categoria" aria-label="categoria" name="category_id" id="category_id"
          aria-describedby="basic-addon1" required>
          <option value="">Selecciona una categoria</option>
          @foreach($categoria as $categorias)
            <option value="{{ $categorias->id }}">{{ $categorias->name }}</option>
          @endforeach
        </select> --}}
        {{-- <select id="select2" class="js-example-basic-single" style="width: 250px;" wire:model="category_id">
          <option value=""></option>
          @foreach($categoria as $categorias)
            <option value="{{ $categorias->id }}">{{ $categorias->name }}</option>
          @endforeach
        </select>
      </div> 

      <div class="input-group mg-b-10">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Nombre</span>
        </div>
        <input type="text" class="form-control" placeholder="Nombre" aria-label="nombre" name="name" id="name"
          aria-describedby="basic-addon1" required>
      </div>
      <br>
    </form> --}}

    <form action="{{ route('category') }}" method="post" data-parsley-validate="" novalidate="">
      @csrf
      <div class="d-flex justify-content-between align-items-center">
        <h2 class="df-title">Registrar categoria nueva</h2>
        <button type="submit" class="btn icon ion-md-add-circle-outline btn btn-outline-success">Registrar</button>
      </div>
    
      @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    
      <div class="input-group mg-b-10">
        <select id="select2" class="js-example-basic-single form-control" style="width: 100%;" wire:model="category_id" name="category_id" required>
          <option value="">Selecciona una categoria</option>
          @foreach($categoria as $categorias)
            <option value="{{ $categorias->id }}">{{ $categorias->name }}</option>
          @endforeach
        </select>
      </div>
    
      <div class="input-group mg-b-10">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Nombre</span>
        </div>
        <input type="text" class="form-control" placeholder="Nombre" aria-label="nombre" name="name" id="name" aria-describedby="basic-addon1" required>
      </div>
    </form>

    <a href="{{ route('category') }}"
      class="btn icon typcn typcn-arrow-back-outline btn btn-outline-info ">Regresar</a>
  </section>
  
  <br>
  <br>

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
@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
  $('.form-add').submit(function (e) {
    e.preventDefault();

    Swal.fire({
      title: 'Estas seguro?',
      text: "Podrás editar esto despues",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Registrar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        this.submit();
      }
    })
  });
</script>

@endsection