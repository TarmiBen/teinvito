@extends('layouts.users.app')
@section('content')
@livewireStyles()
@include('layouts.users.alert')
    @livewire('adress-index')
@livewireScripts()
@endsection