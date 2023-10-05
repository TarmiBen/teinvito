@extends('layouts.users.app')

@section('content')

    @include('layouts.users.alert')

    @livewire('companie-index')

@endsection