@extends('layouts.users.app')

@section('title', 'Compañias')

@section('content')

    @include('layouts.users.alert')

    @livewire('admin-companies')

@endsection