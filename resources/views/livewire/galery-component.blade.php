<div>
    <section class="container py-5 position-relative">
        <div class="row g-3">
            <div class="col-12 col-lg-6">
                @if($isEditing)
                    @if($images1)
                        <img src="{{ is_string($images1) ? $images1 : $images1->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow">
                    @endif
                    <input type="file" class="form-control input-file" accept=".png,.jpg,.jpeg" wire:model="images1" placeholder="subir imagen">
                @else
                    <img src="{{ asset($images1) }}" alt="" class="img-fluid object-fit-cover shadow">
                @endif
            </div>
            <div class="col-12 col-lg-6">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-6">
                                @if($isEditing)
                                    @if($images2)
                                        <img src="{{ is_string($images2) ? $images2 : $images2->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow" >
                                    @endif
                                    <input type="file" class="form-control input-file" accept=".png,.jpg,.jpeg" wire:model="images2" placeholder="subir imagen">
                                @else
                                    <img src="{{ asset($images2) }}" alt="" class="img-fluid object-fit-cover shadow">
                                @endif
                            </div>
                            <div class="col-6">
                                @if($isEditing)
                                    @if($images3)
                                        <img src="{{ is_string($images3) ? $images3 : $images3->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow" >
                                    @endif
                                    <input type="file" class="form-control input-file" accept=".png,.jpg,.jpeg" wire:model="images3" placeholder="subir imagen">
                                @else
                                    <img src="{{ asset($images3) }}" alt="" class="img-fluid object-fit-cover shadow">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        @if($isEditing)
                            @if($images4)
                                <img src="{{ is_string($images4) ? $images4 : $images4->temporaryUrl() }}" alt="" class="img-fluid object-fit-cover shadow">
                            @endif
                            <input type="file" class="form-control input-file" accept=".png,.jpg,.jpeg" wire:model="images4" placeholder="subir imagen">
                        @else
                            <img src="{{ asset($images4) }}" alt="" class="img-fluid object-fit-cover shadow" >
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- <script>
    let cropper = null;
    let currentImageId = null; // Variable para guardar el id de la imagen que se esta cortando

    $('.input-file').on('change', function() {
        const input = this; // Obtenemos el input que se esta modificando
        currentImageId = input.dataset.imageId; // Obtenemos el id de la imagen que se esta modificando

        let archivos = input.files; // Obtenemos los archivos seleccionados en el input
        let extensiones = input.value.substring(input.value.lastIndexOf('.'), input.value.length);

        const imageContainer = document.querySelector('.image-container'); // Contenedor de imagen
        const image = document.querySelector('.img-cropper'); // Imagen dentro del contenedor

        // Verifica si el elemento 'img-cropper' existe antes de intentar establecer su 'src'
        if (imageContainer && image) {
            if (!archivos || !archivos.length) {
                image.src = "";
                input.value = "";
            } else if (input.getAttribute('accept').split(',').indexOf(extensiones) < 0) {
                alert('Debes seleccionar una imagen');
                input.value = "";
            } else {
                const imageUrl = URL.createObjectURL(archivos[0]);
                image.src = imageUrl;
                // Destruir cropper si existe
                if (cropper) {
                    cropper.destroy();
                }
                // Crear cropper
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    preview: '.img-sample',
                    zoomable: false,
                    viewMode: 1,
                    responsive: false,
                    dragMode: 'none',
                    restore: true,
                    ready() {
                        document.querySelector('.cropper-container').style.width = '100%';
                        document.querySelector('.cropper-container').style.height = '50%';
                    }
                });

                $('#modal').addClass('active'); // Agregamos la clase active a la tarjeta
            }
        } else {
            console.error(`Elemento 'crop-image' con data-image-id "${currentImageId}" no encontrado.`);
        }
    });

    $('#close').on('click', () => {
        let image = document.querySelector(`.crop-image[data-image-id="${currentImageId}"]`);
        let input = document.querySelector(`.input-file[data-image-id="${currentImageId}"]`);

        image.src = "";
        input.value = "";

        if (cropper) {
            cropper.destroy();
        }

        $('#modal').removeClass('active'); // Quitamos la clase active de la tarjeta
    });

    $('#cut').on('click', () => {
        let canva = cropper.getCroppedCanvas(); // Obtenemos el canvas de la imagen cortada
        let cropImage = document.querySelector(`.crop-image[data-image-id="${currentImageId}"]`);// Obtenemos la imagen que se esta cortando
        let input = document.querySelector(`.input-file[data-image-id="${currentImageId}"]`);// Obtenemos el input que se esta modificando

        canva.toBlob(function(blob) {
            let urlCut = URL.createObjectURL(blob);
            cropImage.src = urlCut;
        });

        input.value = "";

        if (cropper) {
            cropper.destroy();
        }

        $('#modal').removeClass('active'); // Quitamos la clase active de la tarjeta
    });
</script> -->