@props(['comment'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            @if ($comment->author->username == 'Nokonsumo')
                <img src="/images/nokonsumo.jpg" alt="" width="60" height="60" class="rounded-xl">
            @else
                <img src="/images/nokonsumo.jpg" alt="" width="60" height="60" class="rounded-xl">
            @endif
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->username }}</h3>

                <p class="text-xs">
                    Publicado
                    <time>{{ $comment->created_at->diffForHumans() }}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>
