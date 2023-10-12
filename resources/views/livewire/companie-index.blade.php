<div>
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto m-0">Lista de Compañias</h3>
        <div class="col-auto">
            <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">
                <i class="fa-regular fa-square-plus"></i>
                Nueva Compañia
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
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
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
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
                                            <img src="{{ asset('storage/'.$company->logo) }}" alt="{{ $company->name }}" width="50px">
                                        @else
                                            Sin imagen
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.companies.destroy', $company) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.companies.show', $company) }}" class="btn btn-icon btn-warning">
                                                <i class="fa-regular fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-icon btn-info">
                                                <i class="fa-regular fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-icon btn-danger">
                                                <i class="fa-regular fa-trash-alt"></i>
                                            </button>
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
</div>
