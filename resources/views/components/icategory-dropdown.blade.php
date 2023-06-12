<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex text-black">
            {{ isset($currentIcategory) ? ucwords($currentIcategory->name) : 'Categorias' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item class="transition text-black"
        href="/image/?{{ http_build_query(request()->except('icategory', 'page')) }}"
        :active="request()->routeIs('/image') && is_null(request()->getQueryString())"
    >
        Todas
    </x-dropdown-item>

    @foreach ($icategories as $icategory)
        <x-dropdown-item class="transition text-black"
            href="/image/?icategory={{ $icategory->slug }}&{{ http_build_query(request()->except('icategory', 'page')) }}"
            :active='request()->fullUrlIs("*?icategory={$icategory->slug}*")'
        >
            {{ ucwords($icategory->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
