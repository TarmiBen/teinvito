@extends('layouts.users.app')

@section('content')

    @include('layouts.users.alert')

    @livewire('service-package-index')

@endsection