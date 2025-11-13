<footer class="bg-very-dark-blue py-6">
    <section class="">
        <div class="flex flex-col sm:flex-row items-center sm:items-start text-white gap-6 sm:gap-8 p-4 w-full">

            {{-- Logotipo: 1/6 del ancho --}}
            <div class="w-full sm:w-1/6 flex justify-sta sm:justify-start items-center">
                <img src="{{ asset('images/logo-footer.png') }}" alt="Electrónica Dos Mil" class="h-auto"
                    style="max-height: 100px;">
            </div>

            {{-- Opciones: 2/6 del ancho --}}
            <div class="w-full sm:w-2/6">
                <h3 class="text-xl font-semibold mb-2 border-b-2 border-orange-500 pb-1 inline-block">Descubrir</h3>
                <nav>
                    <ul class="text-sm space-y-1">
                        <li><a href="#" class="hover:text-orange-500 transition-colors duration-300">productos</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors duration-300">Servicios</a></li>
                        <li><a href="/contacto" class="hover:text-orange-500 transition-colors duration-300">Contacto</a></li>
                        
                    </ul>
                </nav>
            </div>

            {{-- Mapa: 3/6 (50%) del ancho --}}
            <div class="w-full sm:w-1/2">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3759.998382644085!2d-99.19280599999999!3d19.541683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f81c4f6ca2fb%3A0xd004c5ce5ce61f4a!2sElectr%C3%B3nica%20Dos%20Mil!5e0!3m2!1ses-419!2smx!4v1759940044531!5m2!1ses-419!2smx"
                    class="w-full h-52 sm:h-56" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                {{-- Copyright separado --}}
                
            </div>
        </div>
        <div class="text-white text-sm mt-2 text-center bg-gray-500 py-2 mb-0">
            Copyright {{ date('Y') }} - <a href="/aviso-de-privacidad">Aviso de privacidad</a>
        </div>


    </section>
</footer>
