@extends('layouts.app')
@section('content')

<section>
    <h2 class="fw-bold">
        Mi suscripción
    </h2>
    <span class="fs-5">
        Desde aquí podrás administrar o cambiar tu suscripción y modificar tu método de pago.
    </span>

    <div class="mt-4">
        <div class="card">
            <div class="rounded-top py-4 px-3 bg-quaternary-ti text-light">
                <h3 class="fw-bold">Plan Básico</h3>
            </div>
            <div class="container p-3">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <span class="fw-bold fs-5">
                            Detalles de la suscripción
                        </span>
                        <div class="mt-3">
                            <div class="d-flex">
                                <span class="fw-bold">Fecha de inicio:</span> 01/01/2021
                            </div>
                            <div class="d-flex">
                                <span class="fw-bold">Fecha de fin:</span> 01/01/2022
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                        <span class="fw-bold fs-5">
                            Tu suscripción incluye:
                        </span>
                        <div class="mt-3">
                            <div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
