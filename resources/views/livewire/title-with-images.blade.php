<div>
    @if($preview)
    <div>
        <div class="container-fluid mt-4 mt-md-0">
            <div class="container text-center" style="padding: 50px;">
                    <h1>
                        {{ $title }}
                    </h1>
            </div>
            <div class="container">
                <div class="row mt-4 mt-md-0">
                    <div class="col-md-4 mb-4 mt-4 mt-md-0">
                            <img src="{{asset($image1)}}" alt="Imagen 1" width="215" height="215">
                            <p>{{ $description1 }}</p>
                    </div>
                    <div class="col-md-4 mb-4 mt-4 mt-md-0">
                            <img src="{{asset($image2)}}" alt="Imagen 2" width="215" height="215">
                            <p>{{ $description2 }}</p>
                    </div>
                    <div class="col-md-4 mb-4 mt-4 mt-md-0">
                            <img src="{{asset($image3)}}" alt="Imagen 3" width="215" height="215">
                            <p>{{ $description3 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @else
    <div>
        <div class="container-fluid mt-4 mt-md-0">
            <div class="container text-center" style="padding: 50px;">
                @if ($isEditing)
                    <h1>
                        <input type="text" wire:model="title">
                    </h1>
                @else
                    <h1>{{ $title }}</h1>
                @endif
            </div>
            <div class="container">
                <div class="row mt-4 mt-md-0">
                    <div class="col-md-4 mb-4 mt-4 mt-md-0">
                    @if($isEditing)
                        @if($image1 instanceof \Livewire\TemporaryUploadedFile)
                            <img src="{{ $image1->temporaryUrl() }}" alt="Imagen 1" width="215" height="215">
                        @endif
                            <input type="file" class="form-control-file" id="image1" wire:model="image1">
                        @else
                            <img src="{{ asset('storage/app/'.$image1) }}" alt="Imagen 1" width="215" height="215">
                        @endif

                        @if ($isEditing)
                            <textarea wire:model="description1"></textarea>
                        @else
                            <p>{{ $description1 }}</p>
                        @endif
                    </div>
                    <div class="col-md-4 mb-4 mt-4 mt-md-0">
                        @if($isEditing)
                            @if($image2 instanceof \Livewire\TemporaryUploadedFile)
                                <img src="{{ $image2->temporaryUrl() }}" alt="Imagen 2" width="215" height="215">
                            @elseif($image2)
                                <img src="{{ asset('storage/app/'.$image2) }}" alt="Imagen 2" width="215" height="215">
                            @endif
                            <input type="file" class="form-control-file" id="image2" wire:model="image2">
                        @else
                            <img src="{{ asset('storage/app/'.$image2) }}" alt="Imagen 2" width="215" height="215">
                        @endif

                        @if ($isEditing)
                            <textarea wire:model="description2"></textarea>
                        @else
                            <p>{{ $description2 }}</p>
                        @endif
                    </div>
                    <div class="col-md-4 mb-4 mt-4 mt-md-0">
                        @if($isEditing)
                            @if($image3 instanceof \Livewire\TemporaryUploadedFile)
                                <img src="{{ $image3->temporaryUrl() }}" alt="Imagen 3" width="215" height="215">
                            @elseif($image3)
                                <img src="{{ asset('storage/app/'.$image3) }}" alt="Imagen 3" width="215" height="215">
                            @endif
                                <input type="file" class="form-control-file" id="image3" wire:model="image3">
                        @else
                            <img src="{{ asset('storage/app/'.$image3) }}" alt="Imagen 3" width="215" height="215">
                        @endif

                        @if ($isEditing)
                            <textarea wire:model="description3"></textarea>
                        @else
                            <p>{{ $description3 }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
