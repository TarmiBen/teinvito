@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('title', 'Detalle del Evento')
@section('content')
<div class="row justify-content-between align-items-center">
    <h3 class="col-auto">Detalle del Evento</h3>
    <div class="col-auto d-flex">
        <form action="{{ route('event.destroy', $event) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('event.create') }}" class="btn btn-outline-success">
                <i data-feather="plus-square"></i>
                Nuevo Evento
            </a>
            <a href="{{ route('event.edit', $event) }}" class="btn btn-warning">
                <i data-feather="edit"></i>
                Editar
            </a>
            <button type="submit" class="btn btn-danger">
                <i data-feather="trash"></i>
                Eliminar
            </button>
        </form>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12 col-lg-6">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title fs-3 text-primary">
                        {{ $event->title }}
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-auto card-subtitle mb-3 text-muted fw-bold">
                            Evento creado por: <a href="#">{{ $event->User->name }}</a>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="mb-3">Informacion del Evento</h4>
                        <div class="mt-2 text-muted d-flex align-items-center">
                            <span class="fw-bold">
                                Colaborador:
                            </span>
                            <a class="ms-2" href="#">{{ $event->user_invited_id }}</a>
                        </div>
                        <div class="mt-2 text-muted d-flex align-items-center">
                            <span class="fw-bold">
                                Tipo de Evento:
                            </span>
                            <a class="ms-2" href="#">{{ $event->type }}</a>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h4 class="mb-2">Fechas del Evento</h4>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">Fecha de Ceremonia:</span> {{ carbon\Carbon::parse($event->ceremony_date)->format('d-m-Y') }}
                                </span>
                            </div>
                            <br>
                            <div class="col-12 col-sm-6 col-md-4 mt-2 d-flex align-items-center">
                                <span class="fw-bold">
                                    <span class="text-muted">Fecha de Evento:</span> {{ carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
