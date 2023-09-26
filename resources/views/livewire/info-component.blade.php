<div>
    <div class="text-center">
        <h2>
            <input type="text" wire:model="title">
        </h2>
        <h5>
            <input type="text" wire:model="description">
        </h5>
    </div>
    <div class="row g-3 justify-content-center mt-4">
        <div class="col-10 col-lg-5">
            <div class="row bg-light border shadow rounded">
                <div class="col-12 col-sm-6 p-0">
                    @if($image1)
                        <img src="{{ $image1->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow h-100">
                    @endif
                    <input type="file" wire:model="image1" class="form-control">
                </div>
                <div class="col-12 col-sm-6 px-0 py-4 d-flex flex-column justify-content-center align-items-center">
                    <div>
                        <p class="fw-bold">
                            <input type="text" wire:model="event1">
                        </p>
                    </div>
                    <div class="mt-5">
                        <p class="fw-bold">
                            <input type="text" wire:model="date1">
                        </p>
                        <p>
                            <input type="text" wire:model="hour1">
                        </p>
                        <p>
                            <input type="text" wire:model="place1">
                        </p>
                    </div>
                    <div class="mt-5">
                        <a href="" class="btn btn-primary">
                            Ver Ubicacion
                        </a>
                    </div>
                    <input wire:model="link" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-10 col-lg-5 offset-lg-1">
            <div class="row bg-light border shadow rounded">
                <div class="col-12 col-sm-6 p-0">
                    @if($image2)
                        <img src="{{ $image2->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow h-100">
                    @endif
                    <input type="file" wire:model="image2" class="form-control">
                </div>
                <div class="col-12 col-sm-6 px-0 py-4 d-flex flex-column justify-content-center align-items-center">
                    <div>
                        <p class="fw-bold">
                            <input type="text" wire:model="event2">
                        </p>
                    </div>
                    <div class="mt-5">
                        <p class="fw-bold">
                            <input type="text" wire:model="date2">
                        </p>
                        <p>
                            <input type="text"  wire:model="hour2">
                        </p>
                        <p>
                            <input type="text" wire:model="place2">
                        </p>
                    </div>
                    <div class="mt-5">
                        <a href="" class="btn btn-primary">
                            Ver Ubicacion
                        </a>
                    </div>
                    <input wire:model="link2" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
