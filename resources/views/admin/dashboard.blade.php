@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')

    @include('layouts.users.alert')

    @livewire('admin-dashboard')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/assets/js/dashboard-admin.js"></script>

@endsection