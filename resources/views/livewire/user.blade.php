<div>
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Usuarios</h3>

    </div>


    <div class="row mt-4">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                    <table id="events" class="w-100 table table-striped">
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
                            <th data-priority="id">Id</th>
                            <th data-priority="user_id">Nombre</th>
                            <th data-priority="user_invited_id">Apellido</th>
                            <th data-priority="tittle">Telefono</th>
                            <th data-priority="type">Email</th>
                            <th data-priority="actions">Acciones</th>
                        </tr>
                        </thead>
                        <tbody enctype="multipart/form-data">
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">

                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.user.show', $user) }}" class="btn btn-icon btn-warning">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- The whole world belongs to you. --}}
</div>
