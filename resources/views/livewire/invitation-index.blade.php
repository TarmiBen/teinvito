<div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto m-0">Lista de invitaciones</h3>
        <div class="col-auto">
            <a href="{{ route('invitations.create') }}" class="btn btn-primary">
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
                                        <a href="{{ route('invitations.show', $invitation) }}" class="btn btn-sm btn-success">Ver</a>
                                        <a href="{{ route('invitations.create', $invitation) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <button wire:click="deleteConfirm({{ $invitation->id }})" class="btn btn-sm btn-danger">Eliminar</button>
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

