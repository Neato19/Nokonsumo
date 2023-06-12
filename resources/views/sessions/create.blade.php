<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Iniciar sesión</h1>

                <form method="POST" action="/login" class="mt-10 text-black">
                    @csrf

                    <x-form.input nombre="email" name="email" type="email" autocomplete="username" required />
                    <x-form.input nombre="contraseña" name="password" type="password" autocomplete="current-password" required />

                    <x-form.button>Iniciar sesión</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>

