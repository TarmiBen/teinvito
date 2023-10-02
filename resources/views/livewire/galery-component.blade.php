<div>
    <div class="row g-3">
        <div class="col-12 col-lg-6">
            @if($images1)
                <img src="{{ $images1->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow h-100">
            @endif
            <input type="file" wire:model="images1" class="form-control">
        </div>
        <div class="col-12 col-lg-6">
            <div class="row g-3">
                <div class="col-12">
                    <div class="row g-3">
                        <div class="col-6">
                            @if($images2)
                                <img src="{{ $images2->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow h-100">
                            @endif
                            <input type="file" wire:model="images2" class="form-control">
                        </div>
                        <div class="col-6">
                            @if($images3)
                                <img src="{{ $images3->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow h-100">
                            @endif
                            <input type="file" wire:model="images3" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    @if($images4)
                        <img src="{{ $images4->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow h-100">
                    @endif
                    <input type="file" wire:model="images4" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
