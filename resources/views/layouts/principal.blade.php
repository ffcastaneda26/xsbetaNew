<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> --}}
    <link rel="icon" href="{{ asset('images/favicon-32x32.png') }}" sizes="any">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-principal bright-red flex flex-col min-h-screen">
    <div class="grow">
        <header>
            <nav class="wrapper h-20 flex items-center justify-between">

                <a href="#" class="w-1/3 max-w-[140px]">
                    <img src="{{ asset('images/logo.svg') }}" class="w-full">
                </a>

                <input type="checkbox" id="menu" class="peer hidden">
                <label for="menu"
                    class="bg-open-menu w-6 h-5 bg-cover bg-center cursor-pointer peer-checked:bg-close-menu transition-all z-50 md:hidden"></label>
                <div
                    class="fixed inset-0 bg-gradient-to-b from-white/70 to-black/70 translate-x-full peer-checked:translate-x-0 transition-transform z-40 md:static md:bg-none md:translate-x-0">
                    <ul
                        class="absolute inset-x-0 top-24 p-12 bg-white w-[90%] mx-auto rounded-md h-max text-center grid gap-6 font-bold text-dark-blue shadow-2xl md:w-max md:bg-transparent md:p-0 md:grid-flow-col md:static">
                        <li> <a href="#">Opción 1</a></li>
                        <li> <a href="#">Opción 2</a> </li>
                        <li> <a href="#">Opción 3</a> </li>
                        <li> <a href="#">Opción 4</a> </li>
                        <li> <a href="#">Opción 5</a> </li>
                    </ul>

                </div>

                <a href="#" class="button shadow-sm shadow-bright-red/30 hidden py-3 lg:block">Botón Para Algo</a>
            </nav>
        </header>

        <div class="min-h-screen">
            {{ $slot }}
        </div>
        {{-- <main>
            <section class="wrapper text-center py-24 grid gap-12 md:grid-cols-2 md:text-left">
                <article>
                    <h2 class="text-3xl font-bold text-very-dark-blue mb-6 md:text-4xl">CONTENIDO PRINCIPAL
                    </h2>

                    <p class="text-dark-grayish-blue">Aquí se pone lo que se desee como elemento principal</p>
                </article>
            </section>
        </main> --}}
    </div>

    <footer class="bg-very-dark-blue py-2 h-40 sm:h-20">
        <div class="text-center text-white font-bold  md:text-2xl text-[14px]">
            <h3>Pie de página</h3>
        </div>
        <section
            class="wrapper grid gap-2 grid-cols-2 justify-items-center footer-area md:footer-area-md md:grid-cols-1 md:justify-items-stretch">
            <div class="flex flex-wrap gap-2 justify-between w-full [grid-area:social-media]">
                <a href="#"><img src="./images/icon-facebook.svg" class="w-4"> </a>
                <a href="#"><img src="./images/icon-youtube.svg" class="w-4"></a>
                <a href="#"><img src="./images/icon-twitter.svg" class="w-4"></a>
                <a href="#"><img src="./images/icon-pinterest.svg" class="w-4"></a>
                <a href="#"><img src="./images/icon-instagram.svg" class="w-4"></a>
            </div>
            <p class="text-dark-grayish-blue [grid-area:copy] text-end">Copyright {{ date('Y') }}.
                Todos los derechos reservados</p>
        </section>
    </footer>

</body>

</html>
