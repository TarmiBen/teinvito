<div>
    <div class="card hidden">
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
    <section class="container py-5 position-relative">
        <div class="row g-3">
            <div class="col-12 col-lg-6">
                <img class="img-fluid object-fit-cover shadow crop-image" data-image-id="1">
                <input type="file" class="form-control input-file" accept=".png,.jpg,.jpeg" data-image-id="1">
            </div>
            <div class="col-12 col-lg-6">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-6">
                                <img class="img-fluid object-fit-cover shadow crop-image" data-image-id="2">
                                <input type="file" class="form-control input-file" accept=".png,.jpg,.jpeg" data-image-id="2">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid object-fit-cover shadow crop-image" data-image-id="3">
                                <input type="file" class="form-control input-file" accept=".png,.jpg,.jpeg" data-image-id="3">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <img class="img-fluid object-fit-cover shadow crop-image" data-image-id="4">
                        <input type="file" class="form-control input-file" accept=".png,.jpg,.jpeg" data-image-id="4">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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

                $('.card').addClass('active'); // Agregamos la clase active a la tarjeta
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

        $('.card').removeClass('active'); // Quitamos la clase active de la tarjeta
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

        $('.card').removeClass('active'); // Quitamos la clase active de la tarjeta
    });
</script>

<!-- <script>
    let cropper = null;

    $('#input-file').on('change', () => {
        let image = document.getElementById('img-cropper')
        let input = document.getElementById('input-file')
    
        let archivos = input.files
        let extensiones = input.value.substring(input.value.lastIndexOf('.'), input.value.lenght)
        
    
        if(!archivos || !archivos.length){        
            image.src = "";
            input.value = "";
            
        } else if(input.getAttribute('accept').split(',').indexOf(extensiones) < 0){
             alert('Debes seleccionar una imagen')
             input.value = "";
    
        } else {
            let imagenUrl = URL.createObjectURL(archivos[0])
            image.src = imagenUrl
    
            cropper = new Cropper(image, {
                aspectRatio: 1, // es la proporción en la que queremos que recorte en este caso 1:1
                preview: '.img-sample', // contenedor donde se va a ir viendo en tiempo real la imagen cortada
                zoomable: false, //Para que no haga zoom 
                viewMode: 1, //Para que no estire la imagen al contenedor
                responsive: false, //Para que no reacomode con zoom la imagen al contenedor
                dragMode: 'none', //Para que al arrastrar no haga nada
                restore: true, //Para que no se pueda restaurar la imagen
                ready(){ // metodo cuando cropper ya este activo, le ponemos el alto y el ancho del contenedor de cropper al 100%
                    document.querySelector('.cropper-container').style.width = '100%'
                    document.querySelector('.cropper-container').style.height = '100%'
                }
            })
    
            $('.modal').addClass('active')
            $('.modal-content').addClass('active')
    
            $('.modal').removeClass('remove')
            $('.modal-content').removeClass('remove')
        }

    });
    
    $('#close').on('click', () => {
        let image = document.getElementById('img-cropper')
        let input = document.getElementById('input-file')
    
        image.src = "";
        input.value = "";
    
        cropper.destroy()
        selectedImages = [];
    
        $('.modal').addClass('remove')
        $('.modal-content').addClass('remove')
    
        $('.modal').removeClass('active')
        $('.modal-content').removeClass('active')
    })
    
    $('#cut').on('click', () => {
        let crop_image = document.getElementById('crop-image')
        let canva = cropper.getCroppedCanvas()
        let image = document.getElementById('img-cropper')
        let input = document.getElementById('input-file')
    
        canva.toBlob(function(blob){
            let url_cut = URL.createObjectURL(blob)
            crop_image.src = url_cut;
        })
    
        image.src = "";
        input.value = "";
    
        cropper.destroy()
    
        $('.modal').addClass('remove')
        $('.modal-content').addClass('remove')
    
        $('.modal').removeClass('active')
        $('.modal-content').removeClass('active')
    })
</script> -->
