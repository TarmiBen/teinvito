@extends('layouts.users.app')
@section('title', 'Detalle de la Invitación')
@section('content')
@foreach($invitation->InvitationsComponents as $component)
       @livewire($component->component->model_type, ['data' => $component->component->componentDataOrderInvitation($component->invitation_id)])
    @endforeach
@endsection

