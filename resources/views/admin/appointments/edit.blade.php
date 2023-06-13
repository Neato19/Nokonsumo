<x-layout>
    <x-setting :heading="'Editar cita: ' . $appointment->id">
        <form class="text-black" method="POST" action="/admin/appointments/{{ $appointment->id }}"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input nombre="Fecha comienzo de la cita (aaaa-mm-dd hh:mm:ss)" name="start_time" :value="old('start_time', $appointment->start_time)"
                required />
            <x-form.input nombre="Fecha final de la cita (aaaa-mm-dd hh:mm:ss)" name="finish_time" :value="old('finish_time', $appointment->finish_time)"
                required />

            <div>
                <x-form.textarea-not-required nombre="nombre del cliente de la reserva (solo si está reservado)"
                    name="reserved">{{ old('reserved', $appointment->reserved) }}
                </x-form.textarea-not-required>
            </div>
            <div>
                <x-form.textarea-not-required nombre="titulo descriptivo de la cita" name="name">
                    {{ old('name', $appointment->name) }}
                </x-form.textarea-not-required>
            </div>
            <div>
                <x-form.textarea-not-required nombre="telefono del cliente (solo si está reservado)" name="telephone">
                    {{ old('telephone', $appointment->telephone) }}
                </x-form.textarea-not-required>
            </div>

            {{-- <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input nombre="Imagen" name="thumbnail" type="file" :value="old('thumbnail', $appointment->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $appointment->thumbnail) }}" alt="" class="rounded-xl ml-6"
                    width="100">
            </div> --}}

            <x-form.textarea-not-required nombre="Descripción de la idea del cliente (solo si está reservado)"
                name="body">{{ old('body', $appointment->body) }}</x-form.textarea-not-required>


            <x-form.button>Modificar</x-form.button>
        </form>
        <form class="text-black mt-12" method="POST" action="/admin/appointments/{{ $appointment->id }}"
            enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <x-form.button>Borrar</x-form.button>
        </form>
    </x-setting>
</x-layout>
