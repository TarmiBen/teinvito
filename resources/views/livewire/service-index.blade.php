<div>
    @livewireStyles()
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Lista de Servicios</h3>
        <div class="col-auto">
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                <i data-feather="plus-square"></i>
                Crear Servicio
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
                            <div class="form-group">
                                <input wire:model="search" type="text" class="form-control" placeholder="Buscar...">
                            </div>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Servicio</th>
                            <th>Nombre</th>
                            <th>Descipcion</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->category->name }}</td>
                                <td>{{ $service->Company->name }}</td>
                                <td>{{ $service->description_large }}</td>
                                <td>{{ $service->description_small }}</td>
                                <td>
                                    <a href="{{ route('admin.services.show', $service) }}" class="btn btn-sm btn-success">Ver</a>
                                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <button wire:click="deleteConfirm({{ $service->id }})" class="btn btn-sm btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $services->links() !!}
            </div>
        </div>
    </div>
</div>
@livewireScripts()
</div>
