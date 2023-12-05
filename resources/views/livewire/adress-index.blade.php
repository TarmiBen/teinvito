<div>
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Lista de Direcciones</h3>
        <div class="col-auto">
            <a href="{{ route('admin.addresses.create') }}" class="btn btn-primary">
                <i class="fa-regular fa-square-plus"></i>
                Nueva Dirección
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
                                <th>Compañia</th>
                                <th>Nombre de la Sucursal u Oficina</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($addresses as $address)
                                <tr>
                                    <td>{{ $address->id }}</td>
                                    <td>{{ $address->company->name }}</td>
                                    <td>{{ $address->name }}</td>
                                    <td>{{ $address->street }}, {{ $address->int }}, {{ $address->ext }}, {{ $address->cp }}, {{ $address->colony }}, {{ $address->city }}, {{ $address->state }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin.addresses.show', $address) }}" class="btn btn-icon btn-primary">
                                                <i data-feather="eye"></i>
                                            </a>
                                            <a href="{{ route('admin.addresses.edit', $address) }}" class="btn btn-icon btn-info">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <form action="{{ route('admin.addresses.destroy', $address) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon btn-danger">
                                                    <i data-feather="trash-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $addresses->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
