@extends('layouts.users.app')
@if($servicePackageId)
    @section('title', 'Editar Paquete de Servicio')
@else
    @section('title', 'Crear Paquete de Servicio')
@endif

@section('content')
    <link rel="stylesheet" type="text/css" href="/assets/css/cropper.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/cropperImage.css">
    @livewireStyles

    @include('layouts.users.alert')

    @livewire('service-package-create', ['servicePackageId' => $servicePackageId])

    <div class="card hidden" id="modal">
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

    @livewireScripts
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/cropper.js"></script>
    <script>
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
                        responsive: true,
                        dragMode: 'none',
                        restore: true,
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
            let urlCut;

            canva.toBlob(function(blob) {
                urlCut = URL.createObjectURL(blob);
                cropImage.src = urlCut;
            });

            input.value = urlCut;

            if (cropper) {
                cropper.destroy();
            }

            $('#modal').removeClass('active'); // Quitamos la clase active de la tarjeta
        });
    </script>
@endsection