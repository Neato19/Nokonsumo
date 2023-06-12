<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Registro de usuario</h1>

                <form method="POST" action="/register" class="mt-10 text-black">
                    @csrf

                    <x-form.input nombre="Nombre (Real)" name="name" required />
                    <x-form.input nombre="Nombre de Usuario" name="username" required />
                    <x-form.input nombre="Número de telefono" name="telephone" required />
                    <x-form.input nombre="Email" name="email" type="email" required />
                    <x-form.input nombre="Contraseña" name="password" type="password" autocomplete="new-password" required />
                    <x-form.button>Enviar</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
