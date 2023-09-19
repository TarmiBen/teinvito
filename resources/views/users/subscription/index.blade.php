@extends('layouts.app')

@section('content')
    <div>
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
@endsection