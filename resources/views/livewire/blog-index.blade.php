<div>
    <main class="container mx-auto p-4">

        <header class="flex justify-between items-center mb-6">

            <div class="text-3xl font-bold text-center flex-grow">
                <h1 class="text-center">{{ $title }}</h1>
            </div>
            <div style="width: 300px;"></div>

            <div class="flex justify-end">
                <a href="/"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-8 rounded
               transition-colors duration-300 shadow-lg">
                    &larr; REGRESAR
                </a>
            </div>

        </header>

        <div class="mb-6 w-full max-w-4xl mx-auto flex flex-col sm:flex-row justify-between gap-4 items-center">

                <div class="flex justify-start mt-4 pb-8">
                    <input wire:model.live="search" type="text" placeholder="Buscar por título..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm">
                </div>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
            @forelse ($blogs as $blog)
                <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="h-full">
                    <div
                        class="bg-white rounded-lg shadow-xl overflow-hidden h-full transform hover:scale-[1.02] transition duration-300">
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
                    NO HAY COMUNICADOS DISPONIBLES.
                </h1>
            @endforelse
        </div>

        {{-- Enlaces de paginación --}}
        <div class="mt-8 mb-8">
            {{ $blogs->links() }}
        </div>

    </main>
</div>
