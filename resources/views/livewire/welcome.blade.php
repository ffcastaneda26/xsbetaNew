<div>
    {{-- Mantenemos el main, pero le quitamos las clases grid que moveremos al div de promociones --}}
    <main>

        <div class="container mx-auto p-4">
            @livewire('product-card-list', ['title' => 'PROMOCIONES', 'destacadoValue' => 1, 'limit' => 3])
            @livewire('product-card-list', ['title' => 'PRODUCTOS', 'destacadoValue' => 0, 'limit' => 3])


            <hr class="mb-8">

            <div class="container mx-auto p-4">
                <header class="flex justify-between items-center mb-6">
                    <div class="text-3xl font-bold text-center">
                        <h1>COMUNICADOS</h1>
                    </div>
                </header>

                <hr class="mb-8">

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
                    @forelse ($blogs as $blog)
                        <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="h-full">
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden h-full">
                                @include('livewire.imagen-blog')
                                <div class="p-4">
                                    <h3 class="font-bold text-xl mb-2">{{ $blog->title }}</h3>
                                    <p class="text-blue-600 font-semibold text-lg">
                                        {!! $blog->description !!}
                                    </p>

                                </div>
                            </div>
                        </a>

                    @empty
                        <h1 class="col-span-full text-center text-2xl font-bold text-gray-700">
                            NO HAY COMUNICADOS PUBLICADOS.
                        </h1>
                    @endforelse
                </div>

                <div class="flex justify-end mt-4 pb-8">
                    <a href="#" {{-- Define la ruta aquí, ej. route('products.index') --}}
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded p-10
               transition-colors duration-300 shadow-lg shadow-blue-600/50">
                        VER TODOS
                    </a>
                </div>
            </div>

        </div>
    </main>
</div>
