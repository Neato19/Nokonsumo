<x-layout>
    <x-setting heading="Publicar nueva imagen">
        <form class="text-black" method="POST" action="/admin/images" enctype="multipart/form-data">
            @csrf

            <x-form.input nombre="Titulo" name="title" required />
            <x-form.input nombre="URL" name="slug" required />
            <x-form.input nombre="Foto" name="thumbnail" type="file" required />
            <x-form.textarea nombre="Texto" name="body" required />

            <x-form.field>
                <x-form.label nombre="Categoria" name="icategory"/>

                <select name="icategory_id" id="icategory_id" required>
                    @foreach (\App\Models\Icategory::all() as $icategory)
                        <option
                            value="{{ $icategory->id }}"
                            {{ old('icategory_id') == $icategory->id ? 'selected' : '' }}
                        >{{ ucwords($icategory->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="icategory"/>
            </x-form.field>

            <x-form.button>Publicar</x-form.button>
        </form>
    </x-setting>
</x-layout>
