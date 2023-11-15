@extends('layouts.users.app')

@section('title', 'Invitaciones')

@section('content')

    @include('layouts.users.alert')

    @livewire('invitation-index')

@endsection