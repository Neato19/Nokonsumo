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

    .btn {
        width: 150px;
        height: 50px;
        border-radius: 5px;
        border: none;
        transition: all 0.5s ease-in-out;
        font-size: 15px;
        font-weight: 600;
        display: flex;
        align-items: center;
        background: #191919;
        color: #f5f5f5;
    }

    .btn:hover {
        box-shadow: 0 0 20px 0px #333333;
    }

    .btn .icon {
        position: absolute;
        height: 40px;
        width: 70px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.5s;
    }

    .btn .text {
        transform: translateX(55px);
    }

    .btn:hover .icon {
        width: 175px;
    }

    .btn:hover .text {
        transition: all 0.5s;
        opacity: 0;
    }

    .btn:focus {
        outline: none;
    }

    .btn:active .icon {
        transform: scale(0.85);
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

    .fa-instagram {
        padding: 10px 14px;
        -o-transition: .5s;
        -ms-transition: .5s;
        -moz-transition: .5s;
        -webkit-transition: .5s;
        transition: .5s;
        background-color: #333333;
    }

    .fa-instagram:hover {
        /* background: linear-gradient(15deg, #880088, #aa2068, #cc3f47, #de6f3d, #f09f33, #de6f3d, #cc3f47, #aa2068, #880088) no-repeat; */
        background-color: #aa2068;
    }

    .fa-rss {
        padding: 10px 14px;
        -o-transition: .5s;
        -ms-transition: .5s;
        -moz-transition: .5s;
        -webkit-transition: .5s;
        transition: .5s;
        background-color: #333333;
    }

    .fa-rss:hover {
        background-color: #eb8231;
    }

    .fa-whatsapp {
        padding: 10px 14px;
        -o-transition: .5s;
        -ms-transition: .5s;
        -moz-transition: .5s;
        -webkit-transition: .5s;
        transition: .5s;
        background-color: #333333;
    }

    .fa-whatsapp:hover {
        background-color: #1ddf2d;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/" class="text-6xl" style="font-family: 'Canadian Brusher', sans-serif">
                    Nokonsumo
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            {{-- <button class="text-xs font-bold uppercase">
                                Bienvenido, {{ auth()->user()->name }}!
                            </button> --}}
                            <button class="btn">
                                <span class="icon">
                                    <svg viewBox="0 0 175 80" width="40" height="40">
                                        <rect width="80" height="15" fill="#f0f0f0" rx="10"></rect>
                                        <rect y="30" width="80" height="15" fill="#f0f0f0" rx="10">
                                        </rect>
                                        <rect y="60" width="80" height="15" fill="#f0f0f0" rx="10">
                                        </rect>
                                    </svg>
                                </span>
                                <span class="text">MENU</span>
                            </button>
                        </x-slot>

                        <x-dropdown-item class="bg-gray-500">
                            {{ auth()->user()->name }}
                        </x-dropdown-item>

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

        <footer id="faqs" class="border border-black border-opacity-5 rounded-xl py-5 px-10 mt-10">

            <div class="md:flex md:justify-between md:items-center">
                <div class="grid md:mt-0 lg:mt-0 2xl:mt-0 xl:mt-0">
                    <h5 style="font-family: 'Canadian Brusher', sans-serif" class="text-5xl mb-3">Preguntas frecuentes
                    </h5>
                    <a href="map" class="text-sm">Donde encontrarnos</a>
                    <a href="treat" class="text-sm">Como curar el tattoo</a>
                </div>
                <div class="grid mt-14 md:mt-0 lg:mt-0 2xl:mt-0 xl:mt-0">
                    <h5 style="font-family: 'Canadian Brusher', sans-serif" class="text-5xl mb-3">
                        <a href="/social">Redes sociales</a>
                    </h5>
                    <ul class="flex" id="social-icons">
                        <li><a href="https://www.instagram.com/nokonsumo_/" class="social-icon text-2xl"> <i
                                    class="fa fa-instagram"></i></a>
                        </li>
                        <li><a href="/" class="social-icon text-2xl"> <i class="fa fa-rss "></i></a></li>
                        <li><a href="https://wa.link/809n1q" class="social-icon text-2xl"> <i
                                    class="fa fa-whatsapp"></i></a></li>
                    </ul>
                </div>
                {{-- <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                </div> --}}
            </div>
        </footer>
    </section>

    <x-flash />
    @stack('scripts')
</body>
