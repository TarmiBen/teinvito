@extends ('layouts.category.category-functions')

@section('title', 'Editar categoria')

@section('contenido')

<main>
  
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
            <a href="{{route('category')}}" class="btn icon typcn typcn-arrow-back-outline btn btn-outline-info">Regresar</a>
          </form>
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
</main>


