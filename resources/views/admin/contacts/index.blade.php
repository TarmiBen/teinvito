@extends('layouts.users.app')
@section('content')
@livewireStyles()
@include('layouts.users.alert')
    @livewire('contact-index')
@livewireScripts()
@endsection