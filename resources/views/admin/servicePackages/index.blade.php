@extends('layouts.users.app')

@section('content')

    @include('layouts.users.alert')

    @livewire('service-package-index')

    <script href="{{ asset('public/assets/js/livewire-swall.js') }}"></script>

@endsection