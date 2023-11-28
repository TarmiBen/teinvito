@extends('layouts.users.app')
@section('title', 'Crear Sección')
@section('content')
    @livewire('section-create', ['CustomViewId' => $CustomViewId])
@endsection