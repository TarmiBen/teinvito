<div>
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto m-0">Lista de Compañias</h3>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table id="products" class="w-100 table table-striped">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="form-group">
                                    <form method="get"> <!-- Cambia el método a GET -->
                                        @csrf
                                        <label for="logFile">Seleccionar Archivo de Registro:</label>
                                        <select wire:model="selectedLogFile" id="logFile" class="form-control">
                                            <option value="components.log">components.log</option>
                                            <option value="laravel.log">laravel.log</option>
                                            <option value="controller.log">controller.log</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <button wire:click="clearLogFile" class="btn btn-danger">Limpiar Archivo</button>
                                </div>
                            </div>
                        </div>
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Tipo de Log</th>
                                <th>Correo
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logData as $log)
                                <tr>
                                    <td>{{ $log['fecha'] }}</td>
                                    <td><span class="{{ $this->getLogClass($log['tipo']) }}">{{ $log['tipo'] }}</span></td>
                                    <td>{{ $log['mensaje'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

