@extends('layouts.users.app')

@section('content')
    @livewire('section-create', ['CustomViewId' => $CustomViewId])
@endsection