@extends('layouts.users.app')
@section('title', 'Detalle de la Sección')
@section('content')
<div class="mt-4">
    <ul class="nav nav-tabs">
        @foreach($allSections as $sec)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.customView.show', $sec->id) }}">{{ $sec->name }}</a>
        </li>
        @endforeach
    </ul>
</div>
    @foreach($section->SectionComponent as $component)
        @livewire($component->ComponentProvider->model_type, ['data' => $component->ComponentProvider->ComponentViewDataOrder()])
    @endforeach
@endsection
