@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('title', 'Nuevo Evento')
@section('content')
    <div>
        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-between align-items-center mb-3">
                <h3 class="col-auto m-0">Nuevo Evento</h3>
            </div>

            @include('layouts.users.alert')

            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 mt-3">
                                    <label for="title">Nombre del evento:</label>
                                    <input type="text" name="title" class="form-control" placeholder="Titulo"
                                        value="{{ old('title') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6  mt-3">
                                    <label for="user_invited_id">Usuario Invitado:</label>
                                    <input type="email" name="user_invited_id" class="form-control" placeholder="Email del usuario invitado"
                                        value="{{ old('user_invited_id') }}">
                                    @error('user_invited_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6  mt-3">
                                    <label for="type">Tipo de Evento:</label>
                                    <select name="type" id="new_type" class="form-select">
                                        <option value="">Selecciona una opción</option>
                                        <option value="BODA">BODA</option>
                                        <option value="XV AÑOS">XV AÑOS</option>
                                        <option value="GRADUACION">GRADUACION</option>
                                        <option value="new">OTRA</option>
                                    </select>
                                </div>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="ceremony_date">Fecha de Ceremonia:</label>
                                    <input type="date" name="ceremony_date" class="form-control"
                                        placeholder="Fecha de Ceremonia" value="{{ old('ceremony_date') }}">
                                </div>
                                @error('ceremony_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="event_date">Fecha de Evento:</label>
                                    <input type="date" name="event_date" class="form-control"
                                        placeholder="Fecha de Evento" value="{{ old('event_date') }}">
                                </div>
                                @error('event_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="col-12 d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-success" id="btnGuardar">
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#btnGuardar').on('click', function () {
                // Desactivar el botón
                $(this).prop('disabled', true);

                // Cambiar el texto del botón (opcional)
                $(this).html('<i class="fa-regular fa-square-plus"></i> Guardando...');

                // Puedes descomentar la siguiente línea si deseas enviar el formulario después de desactivar el botón
                $('form').submit();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#new_type').change(function() {
                if ($(this).val() === 'new') {
                    $('#type').show();
                    $('#new_type').hide();
                } else {
                    $('#type').hide();
                    $('#new_type').show();
                }
            });
        });
    </script>

@endsection
