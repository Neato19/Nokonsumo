<x-layout>
    <x-setting heading="Publicar nuevo post">
        <form class="text-black" method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input nombre="Titulo" name="title" required />
            <x-form.input nombre="URL" name="slug" required />
            <x-form.input-text-white nombre="Imagen" name="thumbnail" type="file" required />
            <x-form.textarea nombre="Entradilla" name="excerpt" required />
            <x-form.textarea nombre="Texto" name="body" required />

            <x-form.field>
                <x-form.label nombre="Categoria" name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <x-form.button>Publicar</x-form.button>
        </form>
    </x-setting>
</x-layout>
