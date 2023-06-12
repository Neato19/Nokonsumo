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

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input nombre="Imagen" name="thumbnail" type="file" :value="old('thumbnail', $appointment->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $appointment->thumbnail) }}" alt="" class="rounded-xl ml-6"
                    width="100">
            </div>

            <x-form.textarea nombre="Texto" name="body">{{ old('body', $appointment->body) }}</x-form.textarea>


            <x-form.button>Modificar</x-form.button>
        </form>
    </x-setting>
</x-layout>
