<footer class="bg-very-dark-blue py-6">

    <section class="wrapper flex items-center text-white">

        <div class="flex items-start w-full justify-between gap-8">
            {{-- Logotipo --}}
            <div class="w-[10%] flex justify-start">
                <img src="{{ asset('images/logo-footer.png') }}" alt="Electrónica Dos Mil" class="max-w-full h-auto"
                    style="max-height: 100px;">
            </div>

            {{-- Opciones --}}
            <div class="w-[20%]">
                <h3 class="text-xl font-semibold mb-2 border-b-2 border-orange-500 pb-1 inline-block">Descubrir</h3>
                <nav>
                    <ul class="text-sm space-y-1">
                        <li><a href="#" class="hover:text-orange-500 transition-colors duration-300">Catálogo de
                                productos</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors duration-300">Catálogo de
                                servicios</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors duration-300">Conoce IBM
                                Cloud</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors duration-300">Opciones de
                                financiamiento</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors duration-300">Conozca la
                                Nube Pública de IBM</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors duration-300">Opciones de
                                financiamiento</a></li>
                    </ul>
                </nav>
            </div>

            {{-- Mapa --}}
            <div class="flex flex-col text-end w-full">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3759.998382644085!2d-99.19280599999999!3d19.541683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f81c4f6ca2fb%3A0xd004c5ce5ce61f4a!2sElectr%C3%B3nica%20Dos%20Mil!5e0!3m2!1ses-419!2smx!4v1759940044531!5m2!1ses-419!2smx"
                    width="960" height="220" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

                <div class="text-white text-sm font-semibold text-end">
                    © Copyright {{ date('Y') }}
                </div>
            </div>
        </div>

    </section>
</footer>
