<!doctype html>

<title>Nokonsumo</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.cdnfonts.com/css/canadian-brusher" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css);

    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;

        box-sizing: border-box;
        object-fit: cover;
    }

    html {
        scroll-behavior: smooth;

    }

    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }

    body {
        background-color: #191919;
        color: white;
    }

    footer {
        background-color: #333333;
        /* opacity: 0.2; */
        -webkit-backdrop-filter: blur(20px);
    }

    .social-icon {
        color: #fff;
    }

    #social-icons li {
        vertical-align: top;
        display: inline;
        height: 100px;
    }

    #social-icons a {
        color: #fff;
        text-decoration: none;
    }
</style>

{{-- <x-layout> --}}
<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-8xl">
        <span class="text-white-500" style="font-family: 'Canadian Brusher', sans-serif">Nokonsumo</span>
    </h1>
    <h2 class="mt-6">
        <span class="text-gray-500">Aqui vais a poder acceder a todas mis redes y contenido</span>
    </h2>

</header>
<section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10">
        <x-panel class="my-4 transition-opacity hover:opacity-30" style="background-color: #333333;">
            <h1 class="text-center font-bold text-xl">
            <a href="https://www.instagram.com/nokonsumo_/" class="social-icon text-2xl"> <i
                    class="fa fa-instagram"></i>
                <h2>Instagram<h2>
            </a>
            </h1>
        </x-panel>
        <x-panel class="my-4 transition-opacity hover:opacity-30" style="background-color: #333333;">
            <h1 class="text-center font-bold text-xl">
            <a href="/" class="social-icon text-2xl"> <i class="fa fa-rss "></i>
                <h2>Página web<h2>

                </a>
            </h1>
        </x-panel>
        <x-panel class="my-4 transition-opacity hover:opacity-30" style="background-color: #333333;">
            <h1 class="text-center font-bold text-xl">
            <a href="https://wa.link/809n1q" class="social-icon text-2xl"> <i class="fa fa-whatsapp"></i>
                <h2>Whatsapp<h2>

                </a>
            </h1>

        </x-panel>
    </main>
</section>
{{-- </x-layout> --}}
