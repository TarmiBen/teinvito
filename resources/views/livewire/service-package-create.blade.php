<div>
    <div>
        <form wire:submit.prevent="storeOrUpdate" enctype="multipart/form-data" method="POST">
            <div class="row justify-content-between align-items-center mb-3">
                <h3 class="col-auto m-0"></h3>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">
                        <i data-feather="plus-square"></i>
                        Guardar
                    </button>
                </div>
            </div>
            @include('layouts.users.alert')
    
            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="service_id">Servicio:</label>
                                    <select wire:model="service_id" class="form-control">
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="name">Name</label>
                                    <input type="text" wire:model="name" class="form-control">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="description">Description</label>
                                    <textarea wire:model="description" class="form-control"></textarea>
                                    @error('description') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="price">Price</label>
                                    <input  class="form-control" wire:model="price" type="text" placeholder='precio'>
                                    @error('price') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12 col-sm-12 mt-3">
                                    <label for="src">Imagen</label>
                                    <input type="file" class="form-control input-file" accept=".png,.jpg,.jpeg" data-image-id="1" wire:model="src">
                                    @error('src.*') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                @if (count($src) > 0)
                                    <table class="table table-striped mt-3">    
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Título</th>
                                                <th>Texto</th>
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