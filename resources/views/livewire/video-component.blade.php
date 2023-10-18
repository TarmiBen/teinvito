<div>
    <section class="container py-5 vh-100 d-flex flex-column align-items-center justify-content-center">
        <h2>
            <input type="text" class="form-control" wire:model="title">
        </h2>
        <div class="mt-4 h-75 w-100">
            <input type="text" class="form-control" wire:model="videoUrl" placeholder="pegar url del video">
            @if ($videoUrl)
            @php
                $this->processVideoUrl();
            @endphp
        
            <iframe class="w-100 h-100" src="{{ $videoUrl }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        @endif
        </div>
    </section>
</div>
