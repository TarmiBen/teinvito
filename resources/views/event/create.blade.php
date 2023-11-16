@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('content')
<div>
    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row justify-content-between align-items-center mb-3">
            <h3 class="col-auto m-0"></h3>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">
                    <i class="fa-regular fa-square-plus"></i>
                    Guardar
                </button>
            </div>
        </div>

        @include('layouts.users.alert')

        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <h3> Nuevo Evento</h3>
                            <div class="col-12 col-sm-12 mt-3">
                                <label for="title">Nombre del evento:</label>
                                <input type="text" name="title" class="form-control" placeholder="Titulo" value="{{ old('title') }}">
                            </div>
                            <div class="col-12 col-sm-6  mt-3">
                                <label for="user_invited_id">Usuario Invitado:</label>
                                <select name="user_invited_id" id="user_invited_id" class="form-select">
                                    <option value="">Selecciona una opción</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name . ' - ' . $user->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6  mt-3">
                                <label for="type">Tipo de Evento:</label>
                                <select name="type" id="new_type" class="form-select">
                                    <option value="">Selecciona una opción</option>
                                    <option value="BODA">BODA</option>
                                    <option value="XV AÑOS">XV AÑOS</option>
                                    <option value="GRADUACION">GRADUACION</option>
                                    <option value="new">New</option>
                                </select>
                            </div>
                            
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="ceremony_date">Fecha de Ceremonia:</label>
                                <input type="date" name="ceremony_date" class="form-control" placeholder="Fecha de Ceremonia" value="{{ old('ceremony_date') }}">
                            </div>
                            
                            <div class="col-12 col-sm-6 mt-3">
                                <label for="event_date">Fecha de Evento:</label>
                                <input type="date" name="event_date" class="form-control" placeholder="Fecha de Evento" value="{{ old('event_date') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
