<div>
    <section class="py-5 bg-secondary-subtle">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-center text-center">
                    <h2>
                        <input type="text" class="form-control" wire:model="title">
                    </h2>
                    <div class="mt-4">
                        <input type="text" class="form-control" wire:model="text">
                    </div>
                    <div class="mt-4">
                        <input type="text" class="btn btn-primary" wire:model="button">
                        <input type="text" class="form-control" wire:model="button_link" placeholder="agregar link" >
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center mt-4 mt-lg-0">
                    @if($image)
                        <img src="{{ is_string($image) ? $image : $image->temporaryUrl() }}" alt="" class="img-fluid object-fit-contain w-75">
                        <input type="file" class="form-control" wire:model="image" placeholder="subir imagen">
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
