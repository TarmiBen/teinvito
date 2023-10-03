@extends('layouts.category.category-functions')

@section('title', 'Mostrar categoria')

@section('contenido')

    <div class="content content-components bg-gray-1 ">
      <h1 class="df-title">Categorias</h1>
        <section id="1">
          
          <table class="table table-bordered table-striped table-dark">
            
            <thead>
              <tr>
                <th>ID</th>
                <th>Categoria</th>
                <th>Nombre</th>
              </tr>
            </thead>
            <tbody>
              
              <tr>              
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->category_id}}</td>
                <td>{{$categoria->name}}</td>          
              </tr>   
            </tbody>
          </table>
        </section>        
        <br>
        <br>
        <a href="{{route('category')}}" class="btn icon typcn typcn-arrow-back-outline btn btn-outline-info">Regresar</a>
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
 
    @endsection
