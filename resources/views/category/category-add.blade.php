@extends('layouts.users.app')

@section('title','Agregar categoria')

@section('content')


<div class="content content-components bg-gray-1">

    <header class="navbar navbar-header navbar-header-fixed">
        <a href="el-icons.html" id="sidebarMenuOpen" class="burger-menu"><i data-feather="arrow-left"></i></a>
        <div class="navbar-brand">
            <a href="" class="df-logo">dash<span>forge</span></a>
        </div>
        <div id="navbarMenu" class="navbar-menu-wrapper">
            <div class="navbar-menu-header">
                <a href="" class="df-logo">dash<span>forge</span></a>
                <a id="mainMenuClose" href="el-icons.html"><i data-feather="x"></i></a>
            </div>
    </header>

    <div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components ">
        <div class="sidebar-header">
            <a href="" id="mainMenuOpen"><i data-feather="menu"></i></a>
            <h5>Componentes</h5>
            <a href="" id="sidebarMenuClose"><i data-feather="x"></i></a>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-nav">
                <li class="nav-label mg-b-15">Herramientas</li>
                <li class="nav-item show">
                    <a class="nav-link active"><i data-feather="layers"></i> Categorias</a>
                </li>
            </ul>
        </div>
        <div class="section-nav">
            <label class="nav-label">En esta pagina</label>
            <nav id="navSection" class="nav flex-column">
                <a class="nav-link active"> Registrar categoria</a>
            </nav>
        </div>
    </div>

    <section id="section1">

        <form action="{{route('category')}}" method="post" data-parsley-validate="" novalidate="" class="form-add">
            {{-- Formulario de registro de nueva categoría --}}
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="df-title">Registrar categoria nueva </h2>
                <button type="submit"
                    class="btn icon ion-md-add-circle-outline btn btn-outline-success ">Registrar</button>

            </div>

            @if ($errors->any()) {{-- Verifica si hay errores de validación --}}
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li> {{-- Muestra los mensajes de error --}}
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @csrf {{-- Token CSRF para la seguridad del formulario --}}

            <div class="input-group mg-b-10">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Categoria</span>
                </div>
                <select class="custom-select" placeholder="Categoria" aria-label="categoria" name="category_id"
                    id="category_id" aria-describedby="basic-addon1" required>
                    <option value="">Selecciona una categoria</option>
                    @foreach ($category as $categories)
                    <option value="{{$categories->id}}">{{$categories->name}}</option>
                    {{-- Opciones de categoría padre --}}
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
        </form>
        <a href="{{route('category')}}"
            class="btn icon typcn typcn-arrow-back-outline btn btn-outline-info">Regresar</a>
    </section>
    <br>
    <br>
    <footer class="content-footer">
        <div>
            <span>&copy; </span>
            <span>Made by <a href=""></a>benito</span>
        </div>

      @endif

      @csrf

      <div class="input-group mg-b-10">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Categoria</span>
        </div>
    </footer>
</div>
</div>
@endsection

@section('scripts')
    <script src="/assets/lib/jquery/jquery.min.js"></script>
    <script src="/assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/lib/feather-icons/feather.min.js"></script>
    <script src="/assets/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/lib/prismjs/prism.js"></script>
    <script src="/assets/lib/spectrum-colorpicker/spectrum.js"></script>
    <script src="/assets/js/dashforge.js"></script>
    <script>
        $(function () {
            'use strict'
        });

    </script>
@yield('scripts')

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