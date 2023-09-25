<div>
    <section class="container py-5">
        <div class="d-flex flex-column justify-content-center align-items-center text-center">
            <h2>
                <input type="text" class="form-control" wire:model="title">
            </h2>
            <div class="mt-4 w-100">
                <h4 class="fw-bold">
                    <input type="text" class="form-control fw-bold text-center" wire:model="subtitle">
                </h4>

                <div class="row mt-4 justify-content-center">
                    <div class="col-5 col-md-3 col-lg-2">
                        @if($image)
                            <img src="{{ is_string($image) ? $image : $image->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow w-100 rounded-pill" style="height: 300px;">
                        @endif
                        <input type="file" class="form-control" wire:model="image" placeholder="subir imagen">
                    </div>
                    <div class="col-5 col-md-3 col-lg-2 ms-lg-5">
                        @if($image2)
                            <img src="{{ is_string($image2) ? $image2 : $image2->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow w-100 rounded-pill" style="height: 300px;">
                        @endif
                        <input type="file" class="form-control" wire:model="image2" placeholder="subir imagen">
                    </div>
                </div>
            </div>
            <div class="mt-5 fs-4">
                <input type="text" class="form-control mt-5 fs-4 text-center" wire:model="text">
            </div>
            <div class="mt-4 fs-1">
                <input type="text" class="form-control mt-4 fs-1 text-center" wire:model="finalMessage">
            </div>
            <div class="mt-4 fs-1">
                <input type="text" class="form-control mt-4 fs-1 text-center" wire:model="coupleName">
            </div>
        </div>
    </section>
</div>
