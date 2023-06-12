@props(['name','nombre'])

<label class="block mb-2 uppercase font-bold text-xs text-gray-500"
       for="{{ $name }}"
>
    {{ ucwords($nombre) }}
</label>
