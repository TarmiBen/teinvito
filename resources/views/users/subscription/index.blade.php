<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paquetes</title>
    
    <!-- Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Styles CSS -->
    @vite(['resources/sass/app.scss'])
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">

</head>
<body>
    <div class="container py-5">
        <h2>
            <i class="fa fa-list" aria-hidden="true"></i> 
            Paquetes
        </h2>
    
        <div class="row row-cols-4 g-3 justify-content-center mt-3">
            @for($i = 0; $i < 5; $i++)
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center py-2">
                            <h3>
                                Paquete X
                            </h3>
                        </div>
    
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
                            <a href="{{ route('subscription.show', 1) }}" class="btn btn-quaternary-ti w-100">
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
</body>
</html>


