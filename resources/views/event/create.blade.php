@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('title', 'Nuevo Evento')
@section('content')
    <div>
        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-between align-items-center mb-3">
                <h3 class="col-auto m-0">Nuevo Evento</h3>
            </div>

            @if(session('invitation_error'))
                <div class="alert alert-danger">
                    {!! session('invitation_error') !!}
                </div>
            @endif

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
                                    <select name="type" id="new_type" class="form-select" onchange="mostrarOcultarInput()">
                                        <option value="">Selecciona una opción</option>
                                        <option value="BODA" {{ old('type') == 'BODA' ? 'selected' : '' }}>BODA</option>
                                        <option value="XV AÑOS" {{ old('type') == 'XV AÑOS' ? 'selected' : '' }}>XV AÑOS</option>
                                        <option value="GRADUACION" {{ old('type') == 'GRADUACION' ? 'selected' : '' }}>GRADUACION</option>
                                        <option value="new" {{ old('type') == 'new' ? 'selected' : '' }}>OTRA</option>
                                    </select>
                                    <input type="text" name="type2" id="otro_tipo" class="form-control mt-3"
                                        placeholder="Escribe el tipo de evento" value="{{ old('type2') }}" style="display:none;">
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('type2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="ceremony_date">Fecha y hora de Ceremonia:</label>
                                    <input type="datetime-local" name="ceremony_date" class="form-control"
                                        placeholder="Fecha de Ceremonia" value="{{ old('ceremony_date') }}">
                                    @error('ceremony_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6 mt-3">
                                    <label for="event_date">Fecha y hora del Evento:</label>
                                    <input type="datetime-local" name="event_date" class="form-control"
                                        placeholder="Fecha de Evento" value="{{ old('event_date') }}">
                                    @error('event_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
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
        function mostrarOcultarInput() {
            var select = document.getElementById('new_type');
            var inputOtroTipo = document.getElementById('otro_tipo');
            inputOtroTipo.style.display = (select.value === 'new') ? 'block' : 'none';
        }
        document.addEventListener('DOMContentLoaded', function () {
            mostrarOcultarInput();
        });
    </script>

@endsection
