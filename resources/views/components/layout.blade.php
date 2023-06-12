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
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/" class="text-4xl" style="font-family: 'Canadian Brusher', sans-serif">
                    Nokonsumo
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase">
                                Bienvenido, {{ auth()->user()->name }}!
                            </button>
                        </x-slot>

                        @admin
                            <x-dropdown-item class="text-black" href="/admin/posts" :active="request()->is('admin/posts')">
                                Centro de control
                            </x-dropdown-item>

                            <x-dropdown-item class="text-black" href="/admin/posts/create" :active="request()->is('admin/posts/create')">
                                Crear Post
                            </x-dropdown-item>

                            <x-dropdown-item class="text-black" href="/admin/images/create" :active="request()->is('admin/images/create')">
                                Subir imagen
                            </x-dropdown-item>

                            <x-dropdown-item class="text-black" href="/admin/appointments" :active="request()->is('admin/appointments')">
                                Calendario
                            </x-dropdown-item>
                        @endadmin

                        <x-dropdown-item class="text-black" href="#" x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()">
                            Cerrar sesión
                        </x-dropdown-item>

                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown>
                @else
                    <a href="/register"
                        class="text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">
                        Registrate
                    </a>

                    <a href="/login"
                        class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">
                        Inicia sesión
                    </a>
                @endauth
            </div>
        </nav>

        {{ $slot }}

        <footer id="faqs" class="border border-black border-opacity-5 rounded-xl py-16 px-10 mt-10">

            <div class="mt-5">
                <div class="grid">
                    <h5 style="font-family: 'Canadian Brusher', sans-serif" class="text-4xl mb-3">Preguntas frecuentes</h5>
                    <a href="map" class="text-sm">Donde encontrarnos</a>
                    <a href="treat" class="text-sm">Como curar el tattoo</a>
                </div>
                </div>
                </div>
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                </div>
        </footer>
    </section>

    <x-flash />
    @stack('scripts')
</body>
