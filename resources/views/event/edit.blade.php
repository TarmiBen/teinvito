@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('title', 'Editar Evento')
@section('content')
    <div>
        <form action="{{ route('event.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-between align-items-center mb-3">
                <h3 class="col-auto m-0"></h3>
            </div>

            @include('layouts.users.alert')

            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <h3> Actualizar Evento</h3>
                                <div class="col-12 col-sm-12 mt-3">
                                    <label for="title">Nombre del evento:</label>
                                    <input type="text" name="title" class="form-control" placeholder="Titulo"
                                        value="{{ $event->title }}">
                                </div>
                                <div class="col-12 col-sm-6  mt-3">
                                    <label for="user_invited_id">Usuario Invitado:</label>
                                    <input type="text" name="user_invited_id" class="form-control"
                                        placeholder="Email del usuario invitado"
                                        value="{{ $event->user_invited_id }}">
                                </div>
                                <div class="col-12 col-sm-6  mt-3">
                                    <label for="type">Tipo de Evento:</label>
                                    <select name="type" id="new_type" class="form-select" onchange="mostrarOcultarInput()">
                                        <option value="{{ $event->type }}">{{ $event->type }}</option>
                                        <option value="BODA">BODA</option>
                                        <option value="XV AÑOS">XV AÑOS</option>
                                        <option value="GRADUACION">GRADUACION</option>
                                        <option value="new">OTRA</option>
                                    </select>
                                    <input type="text" name="type2" id="otro_tipo" class="form-control mt-3"
                                           placeholder="Escribe el tipo de evento"  style="display:none;">
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="ceremony_date">Fecha de Ceremonia:</label>
                                    <input type="datetime-local" name="ceremony_date" class="form-control"
                                        placeholder="Fecha de Ceremonia"
                                        value="{{ \Carbon\Carbon::parse($event->ceremony_date)->format('Y-m-d H:i:s') }}">
                                </div>

                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="event_date">Fecha del Evento:</label>
                                    <input type="datetime-local" name="event_date" class="form-control"
                                        placeholder="Fecha de Evento"
                                        value="{{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d H:i:s') }}">
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
            </div>
        </form>
    </div>

    <script>
        function mostrarOcultarInput() {
            var select = document.getElementById('new_type');
            var inputOtroTipo = document.getElementById('otro_tipo');

            // Si la opción seleccionada es "new", muestra el input, de lo contrario, ocúltalo.
            inputOtroTipo.style.display = (select.value === 'new') ? 'block' : 'none';
        }
    </script>

@endsection
