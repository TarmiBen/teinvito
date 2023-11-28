@extends('layouts.users.app')

@section('content')
    <div class="mt-4">
        <ul class="nav nav-tabs">
            @foreach($allSections as $sec)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('CustomView.show', $sec->id) }}">{{ $sec->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    @foreach($section->SectionComponent as $component)
        @livewire($component->Component_View->model_type, ['data' => $component->Component_View->ComponentViewDataOrder()])
    @endforeach
@endsection
