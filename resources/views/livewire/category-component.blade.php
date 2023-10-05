<div class="container-fluid">
    <br>
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <form wire:submit.prevent="updatePagination">
                    <label for="pagination">Mostrar:</label>
                    <select wire:model="paginate" id="pagination">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </form>
            </div>
            <div class="search-form">
                <!-- Search box -->
                <input type="search" class="form-control" placeholder="Search" style="width: 250px;" wire:model="search">
                <button class="btn" type="button"><i data-feather="search"></i></button>
            </div>
        </div>
        <table class="table table-striped" id="cat">
            <thead class="thead-primary">
                <tr>
                    <th class="sort" wire:click="sortOrder('id')">ID {!! $sortLink !!}</th>
                    <th class="sort" wire:click="sortOrder('category_id')">Categoria {!! $sortLink !!}</th>
                    <th class="sort" wire:click="sortOrder('name')">Nombre {!! $sortLink !!}</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <br>
            <tbody>
                @foreach($categoria as $categorias)
                    <tr>
                        <td>{{ $categorias->id }}</td>
                        <td>
                            @if($categorias->Category)
                                {{ $categorias->Category->name }}
                            @else
                                Esta es una categoría padre
                            @endif
                        </td>
                        <td>{{ $categorias->name }}</td>
                        <td>
                            <form action="{{ url('category/'.$categorias->id) }}" method="post"
                                class="btn-group form-delete form-edit form-add text-center">
                                @method("DELETE")
                                @csrf
                                <a type="button" class="btn btn-outline-warning far fa-eye"
                                    href="{{ url('category/'.$categorias->id. '/category-show') }}"></a>
                                <a type="button" class="btn btn-outline-info far fa-edit"
                                    href="{{ url('category/'.$categorias->id. '/category-edit') }}"></a>
                                <button type="submit" class="btn btn-outline-danger typcn typcn-delete  "></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $categoria->links() !!} 
    </div>
      
</div>
</section>


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