@extends('layouts.users.app')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('content')
    @livewire('section-create', ['CustomViewId' => $CustomViewId])
@endsection
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
