@extends('layouts.users.app')

@section('content')
@foreach($invitation->InvitationsComponents as $component)
       @livewire($component->component->model_type, ['data' => $component->component->componentDataOrder()])
    @endforeach
@endsection

