<div>
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto m-0">Lista de Invitaciones</h3>
        <div class="col-auto">
            <a href="{{ route('admin.invitations.create') }}" class="btn btn-primary">
                <i data-feather="plus-square"></i>
                Nueva Invitacion
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
                                <th>No. Invitacion</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invitations as $invitation)
                                <tr>
                                    <td>{{ $invitation->id }}</td>
                                    <td>{{ $invitation->User->name }}</td>
                                    <td>{{ $invitation->User->email }}</td>
                                    <td>
                                        <a href="{{ route('admin.invitations.show', $invitation) }}" class="btn btn-sm btn-success">Ver</a>
                                        <a href="{{ route('admin.invitations.create', $invitation) }}" class="btn btn-sm btn-warning">Editar</a>
                                        {{-- <form action="{{ route('admin.invitations.destroy', $invitation) }}" method="POST"> --}}
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $invitations->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

