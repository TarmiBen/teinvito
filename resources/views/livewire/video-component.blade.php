<div>
    <section class="container py-5 vh-100 d-flex flex-column align-items-center justify-content-center">
        <h2>
            <input type="text" class="form-control" wire:model="title">
        </h2>
        <div class="mt-4 h-75 w-100">
            <input type="file" class="form-control" wire:model="video" placeholder="subir video">
            <input type="text" class="form-control" wire:model="videoUrl" placeholder="pegar url del video">
            @if($video)
                <iframe class="w-100 h-100" src="{{ is_string($video) ? $video : $video->temporaryUrl() }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            @endif
            @if($videoUrl)
                <iframe class="w-100 h-100" src="{{ $videoUrl }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            @endif
        </div>
    </section>
</div>
