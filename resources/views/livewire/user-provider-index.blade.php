<div>
    @livewireStyles()
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Lista de Proveedores</h3>
        <div class="col-auto">
            <a href="{{ route('admin.userProviders.create') }}" class="btn btn-primary">
                <i data-feather="plus-square"></i>
                Agregar Proveedor
            </a>
        </div>
    </div>
<div class="row mt-3">
    <div class="stretch-card">
        <div class="card">
            <div class="card-body">
                <table id="products" class="w-100 table table-striped">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="form-group">
                                <label for="paginate">Mostrar:</label>
                                <select wire:model="paginate" class="form-control">
                                    <option selected>10</option>
                                    <option selected>25</option>
                                    <option selected>50</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-auto">
                            <input type="text" wire:model="search" placeholder="Buscar por nombre o email">
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Compañia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userProviders as $userProvider)
                            <tr>
                                <td>{{ $userProvider->id }}</td>
                                <td>{{ $userProvider->user->name }}</td>
                                <td>{{ $userProvider->Company->name }}</td>
                                <td>
                                    <a href="{{ route('admin.userProviders.show', $userProvider) }}" class="btn btn-sm btn-success">Ver</a>
                                    <a href="{{ route('admin.userProviders.edit', $userProvider) }}" class="btn btn-sm btn-primary">Editar</a>
                                    <form action="{{ route('admin.userProviders.destroy', $userProvider) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $userProviders->links() !!}
            </div>
        </div>
    </div>
</div>
@livewireScripts()
</div>
