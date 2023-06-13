@auth
    <x-panel>
        <form method="POST" action="/images/{{ $image->slug }}/icomments">
            @csrf

            <header class="flex items-center">
                @admin
                    <img src="/images/nokonsumo.jpg" alt="" width="40" height="40" class="rounded-full">
                @else
                    <img src="/images/nokonsumo.jpg" alt="" width="40" height="40" class="rounded-full">
                @endadmin

                <h2 class="ml-4">¿Quieres participar?</h2>
            </header>

            <div class="mt-6">
                <textarea name="body" class="w-full p-1 text-black text-sm focus:outline-none focus:ring" rows="5"
                    placeholder="Rápido, ¡Piensa en algo que decir!" required></textarea>

                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-700">
                <x-form.button>Enviar</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Registrate</a> o
        <a href="/login" class="hover:underline">Inicia sesión</a> para dejar un comentario.
    </p>
@endauth
