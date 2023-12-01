@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('title', 'Crear Invitación')
@section('content')
@extends('layouts.users.alert')
@livewire('invitations-create', ['invitationId' => $invitationId])
    @livewireScripts
@endsection
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
