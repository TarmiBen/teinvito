@extends('layouts.users.app')
@section('title', 'Paquetes de Servicios')

@section('content')

    @include('layouts.users.alert')

    @livewire('service-package-index')

@endsection