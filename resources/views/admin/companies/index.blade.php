@extends('layouts.users.app')

@section('title', 'Compañias')

@section('content')

    @include('layouts.users.alert')

    @livewire('companie-index')

@endsection