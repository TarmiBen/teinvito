<div>
    @livewireStyles
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Categoria</h3>
        <div class="col-auto">
            <a href="{{ route('category.create') }}" class="btn btn-primary">
                Nueva categoria
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                    <table id="cat" class="w-100 table table-striped" >
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="pagination">Mostrar:</label>
                                    <form wire:submit.prevent="updatePagination">
                                        <select wire:model="paginate" id="pagination" class="form-control">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="col-auto">
                            <div class="form-group">
                                <input wire:model="search" type="text" class="form-control" placeholder="Buscar...">
                            </div>
                        </div>
                        </div>
                        {{-- $sortLink = '<i class="fas fa-caret-up"></i>'; --}}
                        <thead>
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
                                        <a type="button" class="btn btn-warning ms-1"
                                            href="{{ url('category/'.$categorias->id. '/category-show') }}"> Mostrar</a>
                                        <a type="button" class="btn btn-primary ms-1"
                                            href="{{ url('category/'.$categorias->id. '/category-edit') }}">Editar</a>
                                        <button type="submit"
                                            class="btn btn-danger ms-1">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $categoria->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@livewireScripts
</div>