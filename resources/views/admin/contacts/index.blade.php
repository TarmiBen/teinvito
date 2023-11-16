@extends('layouts.users.app')

@section('title', 'Contactos')

@section('content')

    @include('layouts.users.alert')

    @livewire('contact-index')

@endsection