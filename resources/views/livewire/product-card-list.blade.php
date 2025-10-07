<div class="container mx-auto p-4">

    <header class="flex justify-between items-center mb-6">
        <div class="text-3xl font-bold text-center">
            <h1>{{ $title }}</h1>
        </div>
    </header>

    <hr class="mb-8">

    {{-- Contenedor del Grid de Tarjetas --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
        @forelse ($items as $item)
            <a href="{{ route('product.show', ['slug' => $item->slug]) }}" class="h-full">

                <div class="bg-white rounded-lg shadow-lg overflow-hidden h-full flex flex-col">

                    <div class="h-48 overflow-hidden flex items-center justify-center">
                        @php
                            $imageExists = false;
                            $imagePath = '';
                            if (!empty($item->images) && is_array($item->images) && count($item->images) > 0) {
                                $imagePath = $item->images[0];
                                $imageExists = Storage::disk('public')->exists($imagePath);
                            }
                        @endphp

                        @if ($imageExists)
                            <img src="{{ asset('storage/' . $item->images[0]) }}" alt="{{ $item->name }}"
                                class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('images/generico.jpeg') }}" alt="Imagen genérica"
                                class="w-full h-full object-cover">
                        @endif
                    </div>

                    <div class="p-4 flex-col">
                        <h3 class="font-bold text-xl mb-2">{{ $item->name }}</h3>

                        <div class="max-h-[96px] overflow-hidden line-clamp-3">
                             <div class="text-gray-700 text-base">
                                {!! $item->description !!}
                             </div>
                        </div>
                    </div>
                    <div class="p-4 pt-0">
                        <p class="text-blue-600 font-semibold text-lg text-end">
                            ${{ number_format($item->price, 2, '.', ',') }}
                        </p>
                    </div>
                </div>
            </a>

        @empty
            <h1 class="col-span-full text-center text-2xl font-bold text-gray-700">
                NO HAY {{ $title }} DISPONIBLES.
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
