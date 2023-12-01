<div>
    <div>
        <form wire:submit.prevent="storeOrUpdate" enctype="multipart/form-data" method="POST">
            <div class="row justify-content-between align-items-center mb-3">
                <h3 class="col-auto m-0">Datos del paquete de servicios</h3>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">
                        <i data-feather="plus-square"></i>
                        Guardar
                    </button>
                </div>
            </div>
            @include('layouts.users.alert')
            <div class="mt-4">
                <div class="alert alert-primary" role="alert">
                    Todos los campos marcados con ( <span class="text-danger">*</span> ) son necesarios para su registro.
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="service_id"><span class="text-danger">*</span>Servicio:</label>
                                    <select wire:model="service_id" class="form-control">
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="name"><span class="text-danger">*</span>Name</label>
                                    <input type="text" wire:model="name" class="form-control">
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="description"><span class="text-danger">*</span>Description</label>
                                    <textarea wire:model="description" class="form-control"></textarea>
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="price"><span class="text-danger">*</span>Price</label>
                                    <input class="form-control" wire:model="price" type="number" step="any">
                                </div>
                                <div class="col-12 col-sm-12 mt-3">
                                    <label for="src"><span class="text-danger">*</span>Imagen</label>
                                    <input type="file" class="form-control input-file" accept=".png,.jpg,.jpeg" data-image-id="1" wire:model="src">
                                </div>
                                @if (count($src) > 0)
                                    <table class="table table-striped mt-3">    
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th><span class="text-danger">*</span>Título</th>
                                                <th><span class="text-danger">*</span>Texto</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($src as $index => $image)
                                            <tr>
                                                <td>
                                                    <img class="img-fluid object-fit-cover shadow crop-image" data-image-id="1" width="100">
                                                </td>
                                                <td>
                                                    <input type="text" wire:model="tittle.{{ $index }}" class="form-control">
                                                    @error('tittle.' . $index) <span class="error">{{ $message }}</span> @enderror
                                                </td>
                                                <td>
                                                    <input type="text" wire:model="text.{{ $index }}" class="form-control">
                                                    @error('text.' . $index) <span class="error">{{ $message }}</span> @enderror
                                                </td>
                                                <td>
                                                    <button type="button" wire:click="removeImage({{ $index }})">Eliminar</button>
                                                </td>
                                            </tr>
                 
                                            @endforeach              
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </form>
    </div>
</div>