@extends('layouts/category/category-functions')

@section('title','Categoria')

@section('contenido')

<main>
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
            <a class="nav-link active" ><i data-feather="layers"></i> Categorias</a>
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
    <a href="" class="nav-link">Ver todo</a>
  </nav>
</div>
</div>

<div class="content content-components bg-gray-1">
<h1 class="df-title">Categorias</h1>

<section id="Section1"> 
  <table class="table table-bordered table-striped table-dark"> 
    <thead>
      <tr>
        <th>ID</th>
        <th>Id_Categoria</th>
        <th>Nombre</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categoria as $categorias)
      <tr>              
        <td>{{$categorias->id}}</td>
        <td>{{$categorias->category_id}}</td>
        <td>{{$categorias->name}}</td>
        <td>
          <div class="btn-group-lg" role="group" aria-label="">
            <a type="button" class="btn btn-outline-warning far fa-eye" href="{{url('category/'.$categorias->id. '/category-show')}}"></a>
            <a type="button" class="btn btn-outline-info far fa-edit" href="{{url('category/'.$categorias->id. '/category-edit')}}"></a>
            <form action="{{url('category/'.$categorias->id)}}" method="post">
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-outline-danger typcn typcn-delete"></button>   
            </form>               
        </form>
        </td>          
      </tr>   
      @endforeach         
    </tbody>
  </table>
</section>   

<br>
<br>

<a href="{{route('category.create')}}" class="btn icon ion-md-add-circle-outline btn btn-outline-success ">Registrar</a>
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
</div>
</main>
