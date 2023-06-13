<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Reservar cita: {{ $appointment->start_time }}</h1>
                <form class="text-black" method="POST" action="/appointments/{{ $appointment->id }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div style="display: none">

                        <x-form.textarea nombre="reserved" name="reserved">{{ request()->user()->username }}
                        </x-form.textarea>
                    </div>
                    <div style="display: none">

                        <x-form.textarea nombre="titulo" name="name">{{ request()->user()->username }}
                        </x-form.textarea>
                    </div>
                    <div style="display: none">

                        <x-form.textarea nombre="telefono" name="telephone">{{ request()->user()->telephone }}
                        </x-form.textarea>
                    </div>
                    <p class="text-center text-white mt-3 mb-12">¿Es correcto?</p>
                    <x-form.textarea-not-required nombre="Añade una pequeña descripción de tu idea (opcional)" name="body">{{ old('body', $appointment->body) }}</x-form.textarea-not-required>
                    <div class="grid place-items-center">
                        <x-form.button>Reservar</x-form.button>
                    </div>


                    {{-- <div class="flex mt-6 text-white">
                        <div class="flex-1">
                            <x-form.input nombre="Imagen" name="thumbnail" type="file" :value="old('thumbnail', $appointment->thumbnail)" />
                        </div>

                        <img src="{{ asset('storage/' . $appointment->thumbnail) }}" alt=""
                            class="rounded-xl ml-6" width="100">
                    </div> --}}


                    {{-- <div class="flex mt-6">
                        <div class="flex-1">
                            <x-form.input nombre="Imagen" name="thumbnail" type="file" :value="old('thumbnail', $appointment->thumbnail)" />
                        </div>

                        <img src="{{ asset('storage/' . $appointment->thumbnail) }}" alt=""
                            class="rounded-xl ml-6" width="100">
                    </div>

                    <x-form.textarea nombre="Texto" name="body">{{ old('body', $appointment->body) }}
                    </x-form.textarea> --}}


                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
