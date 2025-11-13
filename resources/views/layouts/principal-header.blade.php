        <header>
            <nav class="border-gray-200">
                <div class="container mx-auto flex flex-wrap items-center justify-between">
                    
                    <a href="/" class="flex justify-center items-center p-4">
                        <img src='{{ asset('images/electronicadosmil.png') }}' width="200" height="auto">
                    </a>

                    <button data-collapse-toggle="mobile-menu" type="button" class="md:hidden ml-3 text-gray-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 rounded-lg inline-flex items-center justify-center" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Menú principal</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>

                    <div class="hidden md:block w-full md:w-auto" id="mobile-menu">

                        <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-medium">
                            <li>
                            <a href="#" class="-nav-button" aria-current="page">Home</a>
                            </li>
                            <li>
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="rounded text-azul hover:bg-azul border-b border-gray-100  md:hover:text-white
                                 md:border-0 pl-3 pr-4 py-2 md:px-4 md:py-0 font-medium flex items-center justify-between w-full md:w-auto">Productos <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar" class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44">
                                    <ul class="py-1" aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Categoría 1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Categoría 1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Categoría 1</a>
                                    </li>
                                    </ul>
                                    <div class="py-1">
                                    <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Todos los productos</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                            <a href="#" class="-nav-button">Servicios</a>
                            </li>
                            <li>
                            <a href="#" class="-nav-button">Contacto</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>


            <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script
        
        </header>
