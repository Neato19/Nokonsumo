@props(['images'])

    <div class="lg:grid lg:grid-cols-6">
        @foreach ($images as $image)
            <x-image-card
                :image="$image"
                class="col-span-2"
            />
        @endforeach
    </div>
