<div>
    <div class="vh-100 w-100 position-absolute">
        <div class="bg-image h-100 w-100">
            
        </div>
    </div>
    <div class="d-flex position-relative vh-100 h-100">
        <div class="col-12 col-xl-4">
            <div class="h-100 d-flex justify-content-center align-items-center align-items-xl-end pb-xl-5">
                <div class="text-start border border-3 py-3 px-4 text-black rounded">
                    <p>
                        @if($isEditing)
                            <span>
                                <input type="text" wire:model="title">
                            </span>
                        @else
                            <span>
                                {{ $title }}
                            </span>
                        @endif
                    </p>
                    <h4 class="mt-4 fw-bold">
                        @if($isEditing)
                            <input type="text" wire:model="subtitle">
                        @else
                            {{ $subtitle }}
                        @endif
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
