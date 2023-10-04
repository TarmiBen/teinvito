@props([
    'disabled' => false,
    'checked' => false
])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'roundes-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!} {{ $checked ? 'checked' : '' }}>

<div class="px-6 py-4"> 
    <x-text-input wire:model="search" class="w-full" type="text" placeholder="Buscar"/>
</div>