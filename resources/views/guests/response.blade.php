<p>Haz clic en una de las siguientes opciones para confirmar tu asistencia:</p>
<form action="{{ route('guests.invitado', ['codigo' => $codigoInvitacion]) }}" method="GET">
    @csrf
    <label for="Asistire">
        <input type="radio" name="respuesta" value="1" id="opcion_voy"> Voy
    </label>
    <label for="No Asistire">
        <input type="radio" name="respuesta" value="2" id="opcion_no_voy"> No voy
    </label>
    <label for="No lo se">
        <input type="radio" name="respuesta" value="3" id="opcion_talvez"> Tal vez
    </label>
    <button type="submit">Enviar Respuesta</button>
</form>

