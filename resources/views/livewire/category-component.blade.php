<div class="card shadow-lg mt-4" wire:ignore>
  <select id="select2" class="form-control select2" wire:model="category_id">
  <option value = ""></option>
    @foreach ($categoria as $categorias)
  <option value="{{$categorias->id}}">{{$categorias->name}}</option>
    @endforeach
  </select>
  <div class="card-body">
  <table class="table" id="cat"> 
    <thead>
      <tr>
        <th>ID</th>
        <th>Categoria</th>
        <th>Nombre</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categoria as $categorias)
      <tr>              
        <td>{{$categorias->id}}</td>
        <td>
          @if ($categorias->Category)
              {{ $categorias->Category->name }}
          @else
              Esta es una categoría padre
          @endif
        </td>
        <td>{{$categorias->name}}</td>
        <td>
          <form action="{{url('category/'.$categorias->id)}}" method="post" class="btn-group form-delete form-edit form-add text-center">
            @method("DELETE")
            @csrf
            <a type="button" class="btn btn-outline-warning far fa-eye" href="{{url('category/'.$categorias->id. '/category-show')}}"></a>
            <a type="button" class="btn btn-outline-info far fa-edit" href="{{url('category/'.$categorias->id. '/category-edit')}}"></a>
            <button type="submit" class="btn btn-outline-danger typcn typcn-delete  "></button>   
          </form>   
        </td>          
      </tr>   
      @endforeach         
    </tbody>
  </table>
  </div>
  
  </div>
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
  </div>
</div>
<script>
  // document.addEventListener('livewire.load', function(){
  //   $('.select2').select2();
  // })

  // $(document).ready(function(){
  //   $('.select2').select2()

  //   $('.select2').on('change', function(){
  //     @this.set('category_id', $(this).val())
  //   })
  // })
</script>
