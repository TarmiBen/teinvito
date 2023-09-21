<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <div class="card py-4 text-center rounded">
=======

    <!-- Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Styles CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">

</head>
<body class="bg-white">
    
    <div class="container">
        <div class="card bg-dark text-white py-4 text-center rounded">
>>>>>>> develop
            <div class="card-body">
                <h1>
                    Cheackout
                </h1>
            </div>
        </div>


        <div class="row g-5 mt-4">
            <div class="col-12 col-xl-8 order-2 order-xl-1">
                <div class="card p-4">
                    <div class="card-body">
<<<<<<< HEAD
                        <div class="card-title">
=======
                        <div class="card-title fw-bold fs-4">
>>>>>>> develop
                            Información del pago
                        </div>
                        <div class="mt-3">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Pagar con Paypal
                                    </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Pagar-Paypal
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Pagar con Mercado Pago
                                    </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div id="mercadoPagoButton"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4 order-1 order-xl-2">
<<<<<<< HEAD
                <div class="card">
=======
                <div class="card bg-secondary-ti">
>>>>>>> develop
                    <div class="card-body">
                        <div class="card-title container fw-bold fs-4">
                            Resumen de la compra
                        </div>   
                        <div class="mt-3 container">
                            <div class="row">
                                <div class="col">
                                    Referencia de pago
                                </div>
                                <div class="col-auto">
                                    1234
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Código del cupón" aria-label="Código del cupón">
                                        <button class="btn btn-outline-primary" type="button" id="btnCupon">Aplicar</button>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h5 class="fw-bold text-primary">
                                        Paquete X
                                    </h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <div class="col">
                                                Subtotal
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            $ 1000.00
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            Descuento
                                        </div>
                                        <div class="col-auto">
                                            $ 0.00
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            Total
                                        </div>
                                        <div class="col-auto">
                                            $ 1000.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<<<<<<< HEAD
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

=======
>>>>>>> develop
    <!-- SDK MercadoPago.js -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script>
        const mp = new MercadoPago("{{ config('mercadopago.public_key') }}");
        const bricksBuilder = mp.bricks();

        //    personalizar boton de mercado pago
        mp.bricks().create("wallet", "mercadoPagoButton", {
            initialization: {
                preferenceId: "{{ $preference->id }}",
                redirectMode: "modal",                
            },
            // customization: {
            //     visual: {
            //         buttonBackground: 'black',
            //         borderRadius: '16px',
            //     },
            //     texts: {
            //         action: 'buy',
            //         valueProp: 'security_details',
            //     },
            //     checkout: {
            //         theme: {
            //             elementsColor: "#f20000",
            //             headerColor: "#ff0000",
            //         },
            //     },
            // },
        });        
    </script>

</body>
</html>