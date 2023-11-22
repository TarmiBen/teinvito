<div class="container">
    <link rel="stylesheet" type="text/css" href="/assets/css/cropper.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/cropperImage.css">
    @livewireStyles

    <h2>Agregar Componentes</h2>
    <ul>
        @foreach($availableComponents as $component => $label)
            <li wire:click="addComponent('{{ $component }}')">{{ $label }}</li>
        @endforeach
    </ul>
    @if(count($selectedComponents) >= 5)
        <p>Has alcanzado el máximo de 5 componentes.</p>
    @endif
    <div>
        @foreach($selectedComponents as $index => $componentData)
            <!-- Aquí utilizamos el nombre del componente obtenido desde la base de datos -->
            @livewire($componentData['component'], ['props' => $componentData['props']], key($index))
            <button wire:click="removeComponent({{ $index }})" class="btn btn-danger">Reset</button>
        @endforeach
        @if($invitationId != null)
            @foreach($invitationComponents as $component)
            @livewire($component->Component->model_type, ['info' => $component->component->componentDataOrderInvitation($component->invitation_id), 'invitationId' => $invitationId], key($component->id))
            @endforeach
        @endif
    </div>

    <div class="hidden" id="modal">
        <div class="card-content">
            <div class="card-header">
                <p>Recorta tu foto</p>
            </div>
            <div class="card-body">
                <div class="image-container">
                    <img src="" alt="" class="img-cropper" id="cropped-image">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn primary" id="cut">Recortar</button>
                <button class="btn secondary" id="close">Cancelar</button>
            </div>
        </div>
    </div>
    
    <button wire:click="saveAll" class="btn btn-primary">Guardar</button>

    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/cropper.js"></script>
    @livewireScripts
</div>

