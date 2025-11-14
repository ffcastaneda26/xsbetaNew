<div>
    {{-- Mantenemos el main, pero le quitamos las clases grid que moveremos al div de promociones --}}
    <main>

        <div class="container mx-auto p-4">
            @livewire('contact-form');

            {{-- @livewire('product-card-list', ['title' => 'PROMOCIONES', 'destacadoValue' => 1, 'limit' => 3])
            @livewire('product-card-list', ['title' => 'PRODUCTOS', 'destacadoValue' => 0, 'limit' => 3]) --}}


            <hr class="mb-8">

            <div class="container mx-auto p-4">
                <header class="flex justify-between items-center mb-6">
                    <div class="text-3xl font-bold text-center">
                        <h1>COMUNICADOS</h1>
                    </div>
                </header>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
                    Apartado de Blogs
                </div>

                <div class="flex justify-end mt-4 pb-8">
                    <a href="{{ route('blogs.index') }}" {{-- ¡Aquí se define la nueva ruta! --}}
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded p-10
               transition-colors duration-300 shadow-lg shadow-blue-600/50">
                        VER TODOS
                    </a>
                </div>
            </div>

        </div>
    </main>
</div>
</div>
