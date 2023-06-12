<x-layout>
    @include ('images._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6 rounded-xl p-5" style="background: #252525; backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);">
        @if ($images->count())
            <x-images-grid :images="$images" />

            {{ $images->links() }}
        @else
            <p class="text-center">La galeria esta vacia, intentalo en otro momento.</p>
        @endif
    </main>
</x-layout>
