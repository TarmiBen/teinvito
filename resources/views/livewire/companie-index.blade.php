<div>
    @livewireStyles()
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Lista de Compañias</h3>
        <div class="col-auto">
            <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">
                <i data-feather="plus-square"></i>
                Nueva Compañia
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
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>RFC</th>
                            <th>Imagen/archivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companys as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->phone }}</td>
                                <td>{{ $company->rfc }}</td>
                                <td>
                                    @if ($company->logo)
                                        <img src="{{ asset($company->logo) }}" width="100px">
                                    @else
                                        Sin imagen
                                    @endif
                                <td>
                                <td>
                                    <a href="{{ route('admin.companies.show', $company) }}" class="btn btn-sm btn-success">Ver</a>
                                    <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-sm btn-primary">Editar</a>
                                    <form action="{{ route('admin.companies.destroy', $company) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $companys->links() !!}
            </div>
        </div>
    </div>
</div>
@livewireScripts()
</div>
