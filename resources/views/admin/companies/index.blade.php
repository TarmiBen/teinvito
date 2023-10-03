@extends('layouts.users.app')
@section('content')
@livewireStyles()
@include('layouts.users.alert')
    @livewire('companie-index')
@livewireScripts()
@endsection