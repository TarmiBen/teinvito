@extends('layouts.users.app')

@section('title', 'Direcciones')

@section('content')

    @include('layouts.users.alert')
    
    @livewire('log-index')

@endsection