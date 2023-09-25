@extends('layouts/category/category-functions')

@section('title','Categoria')

@section('contenido')

<main>
  
<header class="navbar navbar-header navbar-header-fixed">
        <a href="el-icons.html" id="sidebarMenuOpen" class="burger-menu"><i data-feather="arrow-left"></i></a>
        <div class="navbar-brand">
          <a href="../index.html" class="df-logo">dash<span>forge</span></a>
        </div><!-- navbar-brand -->
        <div id="navbarMenu" class="navbar-menu-wrapper">
          <div class="navbar-menu-header">
            <a href="../index.html" class="df-logo">dash<span>forge</span></a>
            <a id="mainMenuClose" href="el-icons.html"><i data-feather="x"></i></a>
          </div>
    </header>

    <div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components">

        <div class="sidebar-header">
            <a href="" id="mainMenuOpen"><i data-feather="menu"></i></a>
            <h5>Componentes</h5>
            <a href="" id="sidebarMenuClose"><i data-feather="x"></i></a>
        </div>
        
        <div class="sidebar-body">    
            <ul class="sidebar-nav">
                <li class="nav-label mg-b-15">Herramientas</li>
                    <li class="nav-item show">
                    <a href="" class="nav-link active" ><i data-feather="layers"></i> Categorias</a>
                    <nav class="nav">
                        <!-- <a href="#">Ver todo</a>
                        <a href="#">Agregar nueva categoria</a> -->
                    </nav>
                </li>
            </ul>
        </div>
        <div class="section-nav">
          <label class="nav-label">En esta pagina</label>
          <nav id="navSection" class="nav flex-column">
            <a class="nav-link">Editar Catergoria</a>
          </nav>
        </div>
    </div>

    <div class="content content-components bg-gray-1">

      <h1 class="df-title">Categoria</h1>

        
        <section id="2">
          <H2 class="df-title">Inserta los datos a editar   </H2>
          <form action="{{ route('category.edit', ['id' => $categoria->id]) }}" method="post" data-parsley-validate="" novalidate="">
          @method("PUT")
          @csrf
            <div class="input-group mg-b-10">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Categoria</span>
              </div>
              <input type="text" class="form-control" placeholder="Categoria" aria-label="categoria" name="category_id" id="category_id" aria-describedby="basic-addon1" value="{{$categoria->category_id}}" required>
            </div>
            
            <div class="input-group mg-b-10">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Nombre</span>
              </div>
              <input type="text" class="form-control" placeholder="Nombre" aria-label="nombre" name="name" id="name"aria-describedby="basic-addon1" value="{{$categoria->name}}" required>
            </div>
            <td><button type="submit" class="btn icon ion-md-add-circle-outline btn btn-outline-success ">    Editar</button></td>
          </form>
        </section>
        <br>
        <a href="{{route('category')}}" class="btn icon typcn typcn-arrow-back-outline btn btn-outline-info ">Regresar</a>

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
</main>


