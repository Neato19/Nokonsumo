@props(['name','nombre'])

<x-form.field>
    <x-form.label nombre="{{ $nombre }}" name="{{ $name }}"/>

    <input class="border border-gray-200 text-white p-2 w-full rounded"
           name="{{ $name }}"
           id="{{ $name }}"
           {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
