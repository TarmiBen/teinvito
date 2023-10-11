<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <section class="py-5 container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-12">
                    <div class="px-5 text-center text-md-start">
                        <!-- <h1>
                            Conviértete en el proveedor, anfitrión o fotógrafo de momentos inolvidables junto a nosotros
                        </h1> -->
                        <h1>
                        Conviértete en el <span id="element"></span> de momentos inolvidables junto a nosotros
                        </h1>
                        <h5 class="mt-3">
                            Descubre un mundo de invitaciones diseñadas para hacer que cada evento sea especial.
                        </h5>
                        <div class="mt-5 d-md-block d-flex flex-column justify-content-center align-items-center">
                            <a href="" class="btn btn-primary-ti fw-bold p-3 fs-5">
                               ¡ Unete ahora !
                            </a>
                            <a href="#" class="ms-md-5 link-underline link-underline-opacity-0 mt-4 mt-lg-0">
                                <span class="btn btn-primary-ti rounded-circle">
                                    <i class="fa-solid fa-play"></i>
                                </span>
                                <span class="link-dark">
                                    Mira nuestro video
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-12 mt-lg-0 mt-5">
                    <div class="row g-3 justify-content-center">
                        <div class="col-lg-5 col-md-3 col-6 d-flex justify-content-end">
                            <img src="https://picsum.photos/500/500" alt="" class="img-fluid object-fit-cover rounded-start-pill shadow-lg" style="height:180px">
                        </div>
                        <div class="col-lg-5 col-md-3 col-6 d-flex">
                            <img src="https://picsum.photos/500/500" alt="" class="img-fluid object-fit-cover rounded shadow-lg" style="height:180px">
                        </div>
                        <div class="col-lg-5 col-md-3 col-6 d-flex justify-content-end">
                            <img src="https://picsum.photos/500/500" alt="" class="img-fluid object-fit-cover rounded shadow-lg" style="height:180px">
                        </div>
                        <div class="col-lg-5 col-md-3 col-6 d-flex">
                            <img src="https://picsum.photos/500/500" alt="" class="img-fluid object-fit-cover rounded-end-pill shadow-lg" style="height:180px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/1500/500" class="d-block w-100 object-fit-cover h-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/1500/500" class="d-block w-100 object-fit-cover h-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/1500/500" class="d-block w-100 object-fit-cover h-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center">
                Beneficios
            </h2>
            <div class="mt-4 row g-3 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 justify-content-center">
                @for($i = 1; $i < 5 ; $i++)
                <div class="col">
                    <div class="card bg-white shadow-sm">
                        <div class="card-body">
                            <span class="fs-4 bg-warning p-2 py-1 rounded">
                                <i class="fa-solid fa-icons"></i>
                            </span>
                            <div class="fs-2 fw-bold mt-3">
                                Beneficio {{ $i }}
                            </div>
                            <div class="mt-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae cupiditate laudantium placeat.
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <section class="py-5 bg-secondary-ti">
        <div class="container">
            <h2 class="text-center">
                Categorias
            </h2>
            <div class="row mt-4 align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="row g-3 row-cols-lg-2">
                    @for($j = 1; $j < 7 ; $j++)
                        <div class="col">
                            <button class="w-100 card btn btn-primary">
                                <div class="card-body py-2">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-warning p-2 py-1 rounded">
                                            <i class="fa-solid fa-camera"></i>
                                        </div>
                                        <span class="ms-3">
                                            Categoria {{ $j }}
                                        </span>
                                    </div>
                                </div>
                            </button>
                        </div>
                    @endfor
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 mt-4 mt-md-0">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <img src="https://picsum.photos/500/500" alt="" class="img-fluid rounded shadow-lg w-100" style="height:300px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <h2 class="text-center">
            Paquetes
        </h2>
        <div class="container">
            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3 justify-content-center mt-3">
                @for($a = 1; $a < 5; $a++)
                    <div class="col">
                        <div class="card border-0 shadow bg-white">
                            <div class="card-header bg-quaternary-ti text-center text-light">
                                <span class="fs-3">
                                    Paquete {{ $a }}
                                </span>
                            </div>
                            <div class="card-body px-4">
            
                                <div class="text-center fs-3 fw-bold">
                                    $300/mes
                                </div>
                                
                                <div class="mt-4">
                                    <div class="d-flex">
                                        <span>
                                            <i class="fas fa-check-circle text-success"></i>
                                        </span>
                                        <span class="ms-2">Plantilla con maximo 8 componentes</span>
                                    </div>
                                    <div class="d-flex">
                                        <span>
                                            <i class="fas fa-check-circle text-success"></i>
                                        </span>
                                        <span class="ms-2">10 componentes</span>
                                    </div>
                                </div>
            
                                <div class="mt-4">
                                    <a href="{{ route('subscription.show', 1) }}" class="btn btn-quaternary-ti w-100 py-2">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                                        Comprar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <section class="py-5 bg-primary-ti">
        <h2 class="text-center">
            Demos
        </h2>
        <div class="container">
            <div class="row g-3 justify-content-center mt-5">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body p-0">
                            <div class="d-flex">
                                <div class="col-6 d-flex flex-column justify-content-center align-items-center">
                                    <div class="fs-5">
                                        Demo 1
                                    </div>
                                    <a href="#" class="mt-2 btn btn-primary-ti">
                                        Ver demo
                                    </a>
                                </div>
                                <div class="col-6 p-0">
                                    <img src="https://picsum.photos/500/500" alt="" class="img-fluid rounded w-100" style="height:150px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body p-0">
                            <div class="d-flex">
                                <div class="col-6 d-flex flex-column justify-content-center align-items-center">
                                    <div class="fs-5">
                                        Demo 1
                                    </div>
                                    <a href="#" class="mt-2 btn btn-primary-ti">
                                        Ver demo
                                    </a>
                                </div>
                                <div class="col-6 p-0">
                                    <img src="https://picsum.photos/500/500" alt="" class="img-fluid rounded w-100" style="height:150px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-primary-subtle">
        <h2 class="text-center">
            Testimonios
        </h2>
        <div class="container mt-5">
            <div class="row g-3 justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body p-0">
                            <div class="d-flex">
                                <div class="col-2 d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-icons text-tertiary-ti fs-1"></i>
                                </div>
                                <div class="col-10">
                                    <div class="position-absolute top-0 end-0">
                                        <img src="https://picsum.photos/500/500" alt="" class="img-fluid rounded border" style="height:50px">
                                    </div>
                                    <div class="pe-5 ps-3 py-4 text-justify">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, tempore. Corrupti pariatur voluptate quis reprehenderit itaque dolores recusandae deleniti eaque vitae mollitia? Nobis, harum! Omnis sequi maiores nihil quo dolore?
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body p-0">
                            <div class="d-flex">
                                <div class="col-2 d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-icons text-tertiary-ti fs-1"></i>
                                </div>
                                <div class="col-10">
                                    <div class="position-absolute top-0 end-0">
                                        <img src="https://picsum.photos/500/500" alt="" class="img-fluid rounded border" style="height:50px">
                                    </div>
                                    <div class="pe-5 ps-3 py-4 text-justify">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, tempore. Corrupti pariatur voluptate quis reprehenderit itaque dolores recusandae deleniti eaque vitae mollitia? Nobis, harum! Omnis sequi maiores nihil quo dolore?
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/lib/typed.js/typed.min.js"></script>


    <script>
        const typed = new Typed('#element', {
            strings: ['<i class="fw-bold text-primary">Proveedor</i>', '<i class="fw-bold text-primary">Anfitrión</i>', '<i class="fw-bold text-primary">Fotógrafo</i>'],
            typeSpeed: 50,
            backSpeed: 50,
            loop: true
        });
    </script>
</body>
</html>