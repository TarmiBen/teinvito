@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Responder a la invitación</div>

                <div class="card-body">
                    <form action="{{ route('guests.invitado', $guests->hash) }}" method="POST">
                        @csrf
                        <div class="col-auto mt-4">
                            <label for="Asistire">
                                <input type="radio" name="respuesta" value="1" id="opcion_voy"> Voy
                            </label>
                        </div>
                        <div class="col-auto mt-4">
                            <label for="No Asistire">
                                <input type="radio" name="respuesta" value="2" id="opcion_no_voy"> No voy
                            </label>
                        </div>
                        <div class="col-auto mt-4">
                            <label for="No lo se">
                                <input type="radio" name="respuesta" value="3" id="opcion_talvez"> Tal vez
                            </label>
                        </div>
                        <div class="col-auto mt-4">
                            <button type="submit" class="btn btn-primary">Enviar Respuesta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

