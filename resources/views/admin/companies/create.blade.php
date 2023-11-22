@extends('layouts.users.app')

@section('title', 'Nueva Compañia')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/css/cropper.css">
<link rel="stylesheet" type="text/css" href="/assets/css/cropperImage.css">
<div>
    <form action="{{ route('admin.companies.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row justify-content-between align-items-center mb-3">
            <h3 class="col-auto m-0">Nueva Compañia</h3>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">
                    <i class="fa-regular fa-square-plus"></i>
                    Guardar
                </button>
            </div>
        </div>

        @include('layouts.users.alert')

        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <h3>Datos de la compañia</h3>
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="name">Nombre de la Compañia:</label>
                                <input type="text" name="name" class="form-control" placeholder="Nombre de la Compañia" value="{{ old('name') }}">
                            </div>
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="rfc">RFC:</label>
                                <input type="text" name="rfc" class="form-control" placeholder="RFC" value="{{ old('rfc') }}">
                            </div>
                            
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="email">Email:</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="phone">Teléfono:</label>
                                <input type="text" name="phone" class="form-control" placeholder="Teléfono" value="{{ old('phone') }}">
                            </div>
        
                            <div class="col-12 col-sm-12 mt-3">
                                <label for="description">Descripción:</label>
                                <textarea name="description" class="form-control" placeholder="Descripción">{{ old('description') }}</textarea>
                            </div>
        
                            <h3 class="col-12 mt-4">Agregar Dirección</h3>
        
                            <div class="col-12 mt-3">
                                <label for="address_name">Nombre de la Sucursal u Oficina:</label>
                                <input type="text" name="address_name" class="form-control" placeholder="Nombre de la Sucursal u Oficina" value="{{ old('address_name') }}">
                            </div>
        
                            <div class="col-12 col-md-6 mt-3">
                                <label for="street">Calle:</label>
                                <input type="text" name="street" class="form-control" placeholder="Calle">
                            </div>
        
                            <div class="col-12 col-sm-6 col-md-3 mt-3">
                                <label for="ext">Número Exterior:</label>
                                <input type="text" name="ext" class="form-control" placeholder="Numero Exterior">
                            </div>
        
                            <div class="col-12 col-sm-6 col-md-3 mt-3">
                                <label for="int">Número Interior:</label>
                                <input type="text" name="int" class="form-control" placeholder="Numero Interior">
                            </div>
        
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="cp">Código Postal:</label>
                                <input type="text" name="cp" class="form-control" placeholder="Codigo Postal" value="{{ old('cp') }}">
                            </div>
        
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="colony">Colonia:</label>
                                <input type="text" name="colony" class="form-control" placeholder="Colonia">
                            </div>
        
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="city">Ciudad:</label>
                                <input type="text" name="city" class="form-control" placeholder="Ciudad">
                            </div>
        
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="state">Estado:</label>
                                <input type="text" name="state" class="form-control" placeholder="Estado">
                            </div>
        
                            <h3 class="col-12 mt-4">Información Adicional</h3>
        
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="logo">Logo:</label>
                                <input type="file" name="logo" class="form-control input-file" placeholder="Logo" value="{{ old('logo') }}" accept=".png,.jpg,.jpeg" data-image-id="1">
                                <img class="img-fluid object-fit-cover shadow crop-image" data-image-id="1">
                            </div>
        
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="cover">Portada:</label>
                                <input type="file" name="cover" class="form-control input-file" placeholder="Cover" value="{{ old('cover') }}" accept=".png,.jpg,.jpeg" data-image-id="2">
                                <img class="img-fluid object-fit-cover shadow crop-image" data-image-id="2">
                            </div>
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

            input.value = "";

            if (cropper) {
                cropper.destroy();
            }

            $('#modal').removeClass('active'); // Quitamos la clase active de la tarjeta
        });
</script>
@endsection