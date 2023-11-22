@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@livewire('section-index')
    @livewireScripts
@endsection
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>