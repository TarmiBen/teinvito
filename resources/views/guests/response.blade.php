@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Responder a la invitación</div>
                <div class="card-body">
                    <form action="{{ route('guests.guest', $guests->hash) }}" method="POST">
                        @csrf
                        <div class="col-auto mt-4">
                            <label for="Asistire">
                                <input type="radio" name="request" value="1"> Confirmar Asistencia
                            </label>
                        </div>
                        <div class="col-auto mt-4">
                            <label for="No Asistire">
                                <input type="radio" name="request" value="2"> No Asistire
                            </label>
                        </div>
                        <div class="col-auto mt-4">
                            <label for="No lo se">
                                <input type="radio" name="request" value="3"> Aún no lo se
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

