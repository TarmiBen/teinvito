<div>
    <section class="py-5 bg-secondary-subtle">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-center text-center">
                    <h2>
                        @if($isEditing)
                            <input type="text" class="form-control" wire:model="title">
                        @else
                            {{ $title }}
                        @endif
                    </h2>
                    <div class="mt-4">
                        @if($isEditing)
                            <input type="text" class="form-control" wire:model="text">
                        @else
                            {{ $text }}
                        @endif
                    </div>
                    <div class="mt-4">
                        @if($isEditing)
                            <input type="text" class="btn btn-primary" wire:model="button">
                            <input type="text" class="form-control" wire:model="button_link" placeholder="agregar link" >
                        @else
                            <a href="{{ $button_link }}" class="btn btn-primary">{{ $button }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center mt-4 mt-lg-0">
                    @if($isEditing)
                        @if($image)
                            <img src="{{ is_string($image) ? $image : $image->temporaryUrl() }}" alt="" class="img-fluid object-fit-contain w-75">
                        @endif
                        <input type="file" class="form-control" wire:model="image" placeholder="subir imagen">
                    @else
                        <img src="{{asset('/storage/app/public/' . $image)}}" alt="Imagen" class="img-fluid" style="max-width: 400px; height: 400px;">
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
