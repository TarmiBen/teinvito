<div>
    <div class="text-center">
        <h2>
            @if($isEditing)
                <input type="text" wire:model="title">
            @else
                {{ $title }}
            @endif
        </h2>
        <h5>
            @if($isEditing)
                <input type="text" wire:model="description">
            @else
                {{ $description }}
            @endif
        </h5>
    </div>
    <div class="row g-3 justify-content-center mt-4">
        <div class="col-10 col-lg-5">
            <div class="row bg-light border shadow rounded">
                <div class="col-12 col-sm-6 p-0">
                    @if($isEditing)
                        @if($image1)
                            <img src="{{ is_string($image1) ? $image1 : $image1->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow h-100">
                        @endif
                            <input type="file" wire:model="image1" class="form-control">
                        @else
                            <img src="{{ asset('storage/' . $image1) }}" alt="" class="img-fluid object-fit-cover shadow h-100">
                    @endif
                </div>
                <div class="col-12 col-sm-6 px-0 py-4 d-flex flex-column justify-content-center align-items-center">
                    <div>
                        @if($isEditing)
                            <p class="fw-bold">
                                <input type="text" wire:model="event1">
                            </p>
                        @else
                            <p class="fw-bold">
                                {{ $event1 }}
                            </p>
                        @endif
                    </div>
                    <div class="mt-5">
                        @if($isEditing)
                            <p class="fw-bold">
                                <input type="text" wire:model="date1">
                            </p>
                            <p>
                                <input type="text" wire:model="hour1">
                            </p>
                            <p>
                                <input type="text" wire:model="place1">
                            </p>
                        @else
                            <p class="fw-bold">
                                {{ $date1 }}
                            </p>
                            <p>
                                {{ $hour1 }}
                            </p>
                            <p>
                                {{ $place1 }}
                            </p>
                        @endif
                    </div>
                    @if($isEditing)
                        <div class="mt-5">
                            <a href="" class="btn btn-primary">
                                Ver Ubicacion
                            </a>
                        </div>
                        <input wire:model="link" class="form-control">
                    @else
                        <a href="{{ $link }}" class="btn btn-primary">
                            Ver Ubicacion
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-10 col-lg-5 offset-lg-1">
            <div class="row bg-light border shadow rounded">
                <div class="col-12 col-sm-6 p-0">
                    @if($isEditing)
                        @if($image2)
                            <img src="{{ is_string($image2) ? $image2 : $image2->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow h-100">
                        @endif
                            <input type="file" wire:model="image2" class="form-control">
                        @else
                            <img src="{{ asset('storage/' . $image2) }}" alt="" class="img-fluid object-fit-cover shadow h-100">
                    @endif
                </div>
                <div class="col-12 col-sm-6 px-0 py-4 d-flex flex-column justify-content-center align-items-center">
                    <div>
                        @if($isEditing)
                            <p class="fw-bold">
                                <input type="text" wire:model="event2">
                            </p>
                        @else
                            <p class="fw-bold">
                                {{ $event2 }}
                            </p>
                        @endif
                    </div>
                    <div class="mt-5">
                        @if($isEditing)
                            <p class="fw-bold">
                                <input type="text" wire:model="date2">
                            </p>
                            <p>
                                <input type="text"  wire:model="hour2">
                            </p>
                            <p>
                                <input type="text" wire:model="place2">
                            </p>
                        @else
                            <p class="fw-bold">
                                {{ $date2 }}
                            </p>
                            <p>
                                {{ $hour2 }}
                            </p>
                            <p>
                                {{ $place2 }}
                            </p>
                        @endif
                    </div>
                    @if($isEditing)
                        <div class="mt-5">
                            <a href="" class="btn btn-primary">
                                Ver Ubicacion
                            </a>
                        </div>
                        <input wire:model="link2" class="form-control">
                    @else
                        <a href="{{ $link2 }}" class="btn btn-primary">
                            Ver Ubicacion
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
