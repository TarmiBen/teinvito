@extends('layouts.users.app')
@section('title', 'Servicios')
@section('content')

    @include('layouts.users.alert')

    @livewire('service-index')

@endsection