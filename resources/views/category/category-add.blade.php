@extends('layouts.category.category-functions')

@section('title','Agregar categoria')

@section('contenido')

<main>

    <div class="content content-components bg-gray-1">
      <h1 class="df-title">Registrar una nueva categoria</h1>
        <section id="section2">
          <form action="{{route('category')}}" method="post" data-parsley-validate="" novalidate="">
          @csrf
            <div class="input-group mg-b-10">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Categoria</span>
              </div>
              <input type="text" class="form-control" placeholder="Categoria" aria-label="categoria" name="category_id" id="category_id" aria-describedby="basic-addon1" required>
            </div>
            
            <div class="input-group mg-b-10">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Nombre</span>
              </div>
              <input type="text" class="form-control" placeholder="Nombre" aria-label="nombre" name ="name" id= "name" aria-describedby="basic-addon1" required>
            </div>
            <td><button type="submit" class="btn icon ion-md-add-circle-outline btn btn-outline-success ">    Registrar</button></td> 
            <a href="{{route('category')}}" class="btn icon typcn typcn-arrow-back-outline btn btn-outline-info ">Regresar</a>
          </form>
        </section>
        <br>
        <br>
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
