@extends('layouts.users.app')
@section('content')
@livewireStyles()
@include('layouts.users.alert')
    @livewire('user-provider-index')
@livewireScripts()
@endsection