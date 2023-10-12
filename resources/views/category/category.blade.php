@extends('layouts.users.app')

@section('content')

@livewireStyles()

@include('layouts.users.alert')

    @livewire('category-component')

    @livewireScripts()

@endsection