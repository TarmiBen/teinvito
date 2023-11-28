@extends('layouts.users.app')
@section('title', 'Proveedores')
@section('content')
@livewireStyles()
@include('layouts.users.alert')
    @livewire('user-provider-index')
@livewireScripts()
@endsection