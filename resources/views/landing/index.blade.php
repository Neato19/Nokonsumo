<x-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 500px;
            height: 600px;
            transition: .3s ease-in-out;
        }

        .swiper-slide:hover {
            transform: scale(1.05);
        }

        .swiper-slide:active {
            transform: scale(1.025);
            transition: 0.1s;
        }

        .swiper-slide a img {
            border-radius: 15px;
            display: block;
            width: 100%;
        }

        .swiper-slide a div div h2 {
          font-family: 'Canadian Brusher', sans-serif; 
          font-size: 7rem;
        }

        .swiper-slide a div div p {
          font-family: 'Canadian Brusher', sans-serif; 
          font-size: 5.5rem;
        }

        .landing-card-title {

            -webkit-transform: rotate(-10deg);
        }

        .swiper-slide .content {
            position: absolute;
            top: -5%;
            left: -15%;
            width: 100%;
            height: 100%;
            z-index: 1;
            display: flex;
            padding: 20px;
            align-items: flex-end;
        }

        .swiper-button-next {
            color: white;
        }

        .swiper-button-prev {
            color: white;
        }

        .swiper-pagination-bullet {
            background: white;
        }

        @media only screen and (max-width: 800px) {

		.swiper-slide {
            width: 250px;
            height: 300px;
        }

        .swiper-slide a div div h2 {
          font-family: 'Canadian Brusher', sans-serif; 
          font-size: 3rem;
        }

        .swiper-slide a div div p {
          font-family: 'Canadian Brusher', sans-serif; 
          font-size: 1.5rem;
        }
}

    </style>

    <main class="max-w-6xl mx-auto mt-12 mb-20 lg:mt-20 space-y-6">
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="/image"><img src="/images/PortadaGaleria.jpg" />
                        <div class="content">
                            <div class="landing-card-title">
                                <h2>GALERIA</h2>
                                <p>DE MUESTRAS
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    @auth
                    <a href="/appointment"><img src="/images/PortadaCitas.jpg" />
                    @else
                    <a href="/login"><img src="/images/PortadaCitas.jpg" />
                    @endauth
                        <div class="content">
                            <div class="landing-card-title">
                                <h2>RESERVA</h2>
                                <p>TU CITA</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="/post"><img src="/images/PortadaNoticias.jpg" />
                        <div class="content">
                            <div class="landing-card-title">
                                <h2>INFORMACIÓN</h2>
                                <p>Y NOTICIAS</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- Código Javascript -->
        <script src="js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper(".mySwiper", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: "auto",
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true,
                },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        </script>
    </main>
</x-layout>
