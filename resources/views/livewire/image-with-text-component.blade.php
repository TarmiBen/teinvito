<div>
    @if (session()->has('message'))

    <div class="alert alert-success">{{ session('message') }}</div>

    @endif

    @if ($errors->has('message'))
        <div class="alert alert-danger">{{ $errors->first('message') }}</div>
    @endif

    @if($preview)
    <div style="background-image: url('{{ $backgroundImage }}'); background-size: 50% 50%;">
        <div class="container text-center" style="padding: 100px;">
                <h1>{{ $title }}</h1>
            <p>
                    {{ $text }}
            </p>
                    <a href="{{ $buttonLink }}" class="btn btn-primary btn-lg">
                        {{ $buttonText }}
                    </a>
            <br>
        </div>
    </div>
    @else
    @if($backgroundImage)
    <div style="background-image: url('{{ $backgroundImage->temporaryUrl() }}'); background-size: 50% 50%;">
        <input type="file" class="form-control-file" id="backgroundImage" wire:model="backgroundImage">
    @elseif($isEditing)
    <div style="background-image: url('{{ $backgroundImage }}'); background-size: 50% 50%;">
    @endif
        <div class="container text-center" style="padding: 100px;">
            @if ($isEditing)
                <h1>
                    <input type="text" wire:model="title">
                </h1>
            @else
                <h1>{{ $title }}</h1>
            @endif

            <p>
                @if ($isEditing)
                    <input type="text" wire:model="text">
                @else
                    {{ $text }}
                @endif
            </p>

                @if ($isEditing)
                    <input type="text" wire:model="buttonText">
                    <br>
                    <input type="text" wire:model="buttonLink">
                    @error('buttonLink')<span class="text-danger">{{ $message }}</span> @enderror
                @else
                    <a href="{{ $buttonLink }}" class="btn btn-primary btn-lg">
                        {{ $buttonText }}
                    </a>
                @endif

            <br>
        </div>
    </div>
    @endif
</div>

