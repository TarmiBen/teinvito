<div>
    @livewireStyles()
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Lista de Contactos</h3>
        <div class="col-auto">
            <a href="{{ route('admin.servicePackages.create') }}" class="btn btn-primary">
                <i data-feather="plus-square"></i>
                Crear Contacto
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
                            <th>Nombres</th>
                            <th>Descipcion</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicePackages as $servicePackage)
                            <tr>
                                <td>{{ $servicePackage->id }}</td>
                                <td>{{ $servicePackage->service->name }}</td>
                                <td>{{ $servicePackage->name }}</td>
                                <td>{{ $servicePackage->description }}</td>
                                <td>{{ $servicePackage->price }}</td>
                                <td>
                                    <a href="{{ route('admin.servicePackages.show', $servicePackage) }}" class="btn btn-sm btn-success">Ver</a>
                                    <a href="{{ route('admin.servicePackages.create', ['servicePackageId' => $servicePackage->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('admin.servicePackages.destroy', $servicePackage) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $servicePackages->links() !!}
            </div>
        </div>
    </div>
</div>
@livewireScripts()
</div>
