@props(['image'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300  border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 h-full flex flex-col">
        <div>
            <a href="/images/{{ $image->slug }}">
                <img src="{{ asset('storage/' . $image->thumbnail) }}" alt="Blog Post illustration"
                    class="transition-opacity rounded-xl hover:opacity-30"
                    style="height: 342px;width: 342px; object-fit: inherit;">
            </a>
        </div>

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="space-x-2 lg:flex justify-between">
                    <x-icategory-button :icategory="$image->icategory" />
                    @admin
                        <div class="space-x-2 lg:flex justify-between">
                            <form method="POST" action="/admin/images/{{ $image->id }}">
                                <a href="/admin/images/{{ $image->id }}/edit"
                                    class="text-xs mt-1 mr-4 text-blue-500 hover:text-blue-600">Editar</a>
                                @csrf
                                @method('DELETE')
    
                                    <button class="text-xs text-red-500 hover:text-red-600">Borrar</button>
                                </form>
                            </div>
                        </div>
                @endadmin
            </header>
        </div>
    </div>
</article>
