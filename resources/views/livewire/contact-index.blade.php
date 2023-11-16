<div>
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Lista de Contactos</h3>
        <div class="col-auto">
            <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary">
                <i class="fa-regular fa-square-plus"></i>
                Nuevo Contacto
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
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->lastname }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->telephone }}</td>
                                    <td>
                                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-icon btn-warning">
                                                <i class="fa-regular fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.contacts.edit', $contact) }}" class="btn btn-icon btn-info">
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
                    {!! $contacts->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
