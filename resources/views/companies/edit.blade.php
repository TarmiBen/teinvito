@extends('layouts.users.app')

@section('title', 'Editar Compañia')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/css/cropper.css">
<link rel="stylesheet" type="text/css" href="/assets/css/cropperImage.css">
<div>
    <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-between align-items-center mb-3">
            <h3 class="col-auto m-0">Datos de la compañia</h3>
        </div>

        @include('layouts.users.alert')
        <div class="mt-4">
            <div class="alert alert-primary" role="alert">
                Todos los campos marcados con ( <span class="text-danger">*</span> ) son necesarios para su registro.
            </div>
        </div>
        <div class="row mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 mt-3">
                            <label for="name"><span class="text-danger">*</span>Nombre:</label>
                            <input type="text" name="name" class="form-control" placeholder="Nombre"
                                value="{{ $company->name }}">
                        </div>

                        <div class="col-12 col-sm-6 mt-3">
                            <label for="rfc"><span class="text-danger">*</span>RFC:</label>
                            <input type="text" name="rfc" class="form-control" placeholder="RFC"
                                value="{{ $company->rfc }}">
                        </div>

                        <div class="col-12 col-sm-6 mt-3">
                            <label for="email"><span class="text-danger">*</span>Email:</label>
                            <input type="text" name="email" class="form-control" placeholder="Email"
                                value="{{ $company->email }}">
                        </div>

                        <div class="col-12 col-sm-6 mt-3">
                            <label for="phone"><span class="text-danger">*</span>Teléfono:</label>
                            <input type="text" name="phone" class="form-control" placeholder="Teléfono"
                                value="{{ $company->phone }}">
                        </div>

                        <div class="col-12 mt-3">
                            <label for="description"><span class="text-danger">*</span>Descripción:</label>
                            <textarea name="description" class="form-control" placeholder="Descripción">{{ $company->description }}</textarea>
                        </div>

                        <div class="col-12 col-sm-6 mt-3">
                            <label for="logo">Logo:</label>
                            <input type="file" name="logo" class="form-control input-file" placeholder="Logo"value="{{ $company->logo }}" accept=".png,.jpg,.jpeg" data-image-id="1">
                            <img class="img-fluid object-fit-cover shadow crop-image" data-image-id="1">
                        </div>

                        <div class="col-12 col-sm-6 mt-3">
                            <label for="cover">Cover:</label>
                            <input type="file" name="cover" class="form-control" placeholder="Cover"
                                value="{{ $company->cover }}">
                        </div>

                        <div class="col-12 d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-regular fa-square-plus"></i>
                                Guardar
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
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
</div>
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

            input.value = urlCut;

            if (cropper) {
                cropper.destroy();
            }

            $('#modal').removeClass('active'); // Quitamos la clase active de la tarjeta
        });
</script>
</div>
@endsection
