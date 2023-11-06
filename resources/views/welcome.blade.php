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
    <section class="py-5 container">
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
                            <img src="https://picsum.photos/500/500" alt=""
                                class="img-fluid object-fit-cover rounded-start-pill shadow-lg" style="height:180px">
                        </div>
                        <div class="col-lg-5 col-md-3 col-6 d-flex">
                            <img src="https://picsum.photos/500/500" alt=""
                                class="img-fluid object-fit-cover rounded shadow-lg" style="height:180px">
                        </div>
                        <div class="col-lg-5 col-md-3 col-6 d-flex justify-content-end">
                            <img src="https://picsum.photos/500/500" alt=""
                                class="img-fluid object-fit-cover rounded shadow-lg" style="height:180px">
                        </div>
                        <div class="col-lg-5 col-md-3 col-6 d-flex">
                            <img src="https://picsum.photos/500/500" alt=""
                                class="img-fluid object-fit-cover rounded-end-pill shadow-lg" style="height:180px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 container">
        <div class="row g-3">
            <div class="col-12 col-lg-8">
                <div id="carouselPrincipal" class="carousel slide h-100">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselPrincipal" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselPrincipal" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselPrincipal" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner h-100">
                        <div class="carousel-item h-100 active">
                            <img src="https://picsum.photos/1000/500" class="d-block w-100 h-100 object-fit-cover "
                                alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item h-100">
                            <img src="https://picsum.photos/1000/500" class="d-block w-100 h-100 object-fit-cover "
                                alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item h-100">
                            <img src="https://picsum.photos/1000/500" class="d-block w-100 h-100 object-fit-cover "
                                alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPrincipal"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselPrincipal"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="row g-3">
                    <div class="col-12">
                        <img src="https://picsum.photos/300/230" class="card-img" alt="..."
                            style="height: 230px">
                    </div>
                    <div class="col-12">
                        <img src="https://picsum.photos/300/230" class="card-img" alt="..."
                            style="height: 230px">
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div id="carouselExample" class="carousel slide">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn btn-tertiary-ti" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </div>
                    <h2 class="text-center fw-bold">
                        Servicios
                    </h2>
                    <div class="btn btn-tertiary-ti" data-bs-target="#carouselExample" data-bs-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </div>
                <hr>
                <div class="carousel-inner">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                            <div class="row g-3">
                                @for ($j = 1; $j <= 4; $j++)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                        <div class="card bg-white shadow-sm">
                                            <img src="https://picsum.photos/600/500" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                {{-- <span class="fs-4 bg-warning p-2 py-1 rounded">
                                                    <i class="fa-solid fa-icons"></i>
                                                </span> --}}
                                                <div class="fs-2 fw-bold">
                                                    Servicio {{ $i * 4 + $j }}
                                                </div>
                                                <div class="mt-2 text-primary fw-bold fs-4">
                                                    $ {{$i * 4 + $j}},000.00 MXN
                                                </div>
                                                <div class="mt-3">
                                                    <span class="badge rounded-pill text-bg-info fs-5">
                                                        <i class="fa-solid fa-phone"></i>
                                                        Contactanos
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($j != 4)
                                            <div class="d-none d-lg-block"></div>
                                        @endif
                                    </div>
                                @endfor
                            </div>
                        </div>
                    @endfor
                </div>
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
                        @for ($j = 1; $j < 7; $j++)
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
                            <img src="https://picsum.photos/500/500" alt=""
                                class="img-fluid rounded shadow-lg w-100" style="height:300px">
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
                @for ($a = 1; $a < 5; $a++)
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
                                    <a href="{{ route('subscription.show', 1) }}"
                                        class="btn btn-quaternary-ti w-100 py-2">
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
                                    <img src="https://picsum.photos/500/500" alt=""
                                        class="img-fluid rounded w-100" style="height:150px">
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
                                    <img src="https://picsum.photos/500/500" alt=""
                                        class="img-fluid rounded w-100" style="height:150px">
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
                                        <img src="https://picsum.photos/500/500" alt=""
                                            class="img-fluid rounded border" style="height:50px">
                                    </div>
                                    <div class="pe-5 ps-3 py-4 text-justify">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, tempore.
                                        Corrupti pariatur voluptate quis reprehenderit itaque dolores recusandae
                                        deleniti eaque vitae mollitia? Nobis, harum! Omnis sequi maiores nihil quo
                                        dolore?
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
                                        <img src="https://picsum.photos/500/500" alt=""
                                            class="img-fluid rounded border" style="height:50px">
                                    </div>
                                    <div class="pe-5 ps-3 py-4 text-justify">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, tempore.
                                        Corrupti pariatur voluptate quis reprehenderit itaque dolores recusandae
                                        deleniti eaque vitae mollitia? Nobis, harum! Omnis sequi maiores nihil quo
                                        dolore?
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
            strings: ['<i class="fw-bold text-primary">Proveedor</i>',
                '<i class="fw-bold text-primary">Anfitrión</i>', '<i class="fw-bold text-primary">Fotógrafo</i>'
            ],
            typeSpeed: 50,
            backSpeed: 50,
            loop: true
        });
    </script>
</body>

</html>
