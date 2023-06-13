<x-layout>
    <x-setting heading="Publicar nueva cita">
        <form class="text-black" method="POST" action="/admin/appointments" enctype="multipart/form-data">
            @csrf

            <x-form.input nombre="Fecha comienzo de la cita (aaaa-mm-dd hh:mm:ss)" name="start_time" required />
            <x-form.input nombre="Fecha final de la cita (aaaa-mm-dd hh:mm:ss)" name="finish_time" required />
            <x-form.input nombre="nombre del cliente de la reserva (solo si está reservado)" name="reserved" />
            <x-form.input nombre="telefono del cliente (solo si está reservado)" name="telephone" />
            <x-form.input nombre="titulo descriptivo de la cita" name="name" />
            {{-- <x-form.input-text-white nombre="Foto" name="thumbnail" type="file" required /> --}}
            <x-form.textarea-not-required nombre="Descripción de la idea del cliente (solo si está reservado)" name="body" />

            <x-form.button>Publicar</x-form.button>
        </form>
    </x-setting>
</x-layout>
