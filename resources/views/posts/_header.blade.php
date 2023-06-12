<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-8xl">
        <span class="text-white-500" style="font-family: 'Canadian Brusher', sans-serif">Blog</span>
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
            <x-category-dropdown />
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/post/">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <input type="text"
                       name="search"
                       placeholder="Buscar..."
                       class="bg-transparent placeholder-black font-semibold text-sm text-black"
                       value="{{ request('search') }}"
                >
            </form>
        </div>
    </div>
</header>
