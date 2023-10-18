@extends('layouts.users.app')

@section('title','Category')

@section('content')

@livewireStyles()

@include('layouts.users.alert')

@livewire('category-component')

@endsection