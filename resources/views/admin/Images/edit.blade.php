<x-layout>
    <x-setting :heading="'Editar publicación: ' . $image->title">
        <form class="text-black" method="POST" action="/admin/images/{{ $image->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input nombre="Titulo" name="title" :value="old('title', $image->title)" required />
            <x-form.input nombre="URL" name="slug" :value="old('slug', $image->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input nombre="Foto" name="thumbnail" type="file" :value="old('thumbnail', $image->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $image->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            <x-form.textarea nombre="Texto" name="body" required>{{ old('body', $image->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label nombre="Categoria" name="icategory"/>

                <select name="icategory_id" id="icategory_id" required>
                    @foreach (\App\Models\Icategory::all() as $icategory)
                        <option
                            value="{{ $icategory->id }}"
                            {{ old('icategory_id', $image->icategory_id) == $icategory->id ? 'selected' : '' }}
                        >{{ ucwords($icategory->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="icategory"/>
            </x-form.field>

            <x-form.button>Modificar</x-form.button>
        </form>
    </x-setting>
</x-layout>
