@extends('layouts.category.category-functions')

@section('title','category')

@section('contenido')

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
          <form action="{{url('category/'.$categorias->id)}}" method="post" class="btn-group">
            @method("DELETE")
            @csrf
            <a type="button" class="btn btn-outline-warning far fa-eye" href="{{url('category/'.$categorias->id. '/category-show')}}"></a>
            <a type="button" class="btn btn-outline-info far fa-edit" href="{{url('category/'.$categorias->id. '/category-edit')}}"></a>
            <button type="submit" class="btn btn-outline-danger typcn typcn-delete"></button>
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

@endsection
