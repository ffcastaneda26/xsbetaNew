        <header>
            <nav class="wrapper h-20 flex items-center justify-between">

                <a href="#" class="w-1/3 max-w-[140px]">
                    {{-- <img src="{{ asset('images/logo.svg') }}" class="w-full"> --}}
                    <img src="{{ asset('images/logo_excess.jpg') }}" class="w-full">
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
