@extends('layouts.users.category-functions')

@section('title','Agregar categoria')

@section('content')

<div class="content content-components bg-gray-1"> 

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
                    @foreach ($categoria as $categorias)
                    <option value="{{$categorias->id}}">{{$categorias->name}}</option>
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
        <div>
            <nav class="nav">

            </nav>
        </div>
    </footer>
</div>
</div>
@endsection 
