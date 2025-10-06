<div>
    {{-- Mantenemos el main, pero le quitamos las clases grid que moveremos al div de promociones --}}
    <main>

        <div class="container mx-auto p-4">
            {{-- Promociones --}}
            <header class="flex justify-between items-center mb-6">
                <div class="text-3xl font-bold text-center">
                    <h1>PROMOCIONES</h1>
                </div>
            </header>

            <hr class="mb-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 mb-8">
                @forelse ($promociones as $promocion)
                    <a href="{{ route('product.show', ['slug' => $promocion->slug]) }}">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <div class="h-48 overflow-hidden flex items-center justify-center">
                                @php
                                    $imageExists = false;
                                    $imagePath = '';
                                    if (
                                        !empty($promocion->images) &&
                                        is_array($promocion->images) &&
                                        count($promocion->images) > 0
                                    ) {
                                        $imagePath = $promocion->images[0];
                                        $imageExists = Storage::disk('public')->exists($imagePath);
                                    }
                                @endphp

                                @if ($imageExists)
                                    <img src="{{ asset('storage/' . $promocion->images[0]) }}"
                                        alt="{{ $promocion->name }}" class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('images/generico.jpeg') }}" alt="Imagen genérica"
                                        class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-xl mb-2">{{ $promocion->name }}</h3>
                                <p class="text-blue-600 font-semibold text-lg">
                                    ${{ number_format($promocion->price, 2, '.', ',') }}
                                </p>

                            </div>
                        </div>
                    </a>

                @empty
                    <h1 class="col-span-full text-center text-2xl font-bold text-gray-700">NO HAY PROMOCIONES
                        DISPONIBLES.
                    </h1>
                @endforelse
            </div>

            <hr class="mb-8">

            {{-- Productos --}}
            <header class="flex justify-between items-center mb-6">
                <div class="text-3xl font-bold text-center">
                    <h1>PRODUCTOS</h1>
                </div>
            </header>

           <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 mb-8">
                @forelse ($productos as $producto)
                    <a href="{{ route('product.show', ['slug' => $producto->slug]) }}">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <div class="h-48 overflow-hidden flex items-center justify-center">
                                @php
                                    $imageExists = false;
                                    $imagePath = '';
                                    if (
                                        !empty($producto->images) &&
                                        is_array($producto->images) &&
                                        count($producto->images) > 0
                                    ) {
                                        $imagePath = $producto->images[0];
                                        $imageExists = Storage::disk('public')->exists($imagePath);
                                    }
                                @endphp

                                @if ($imageExists)
                                    <img src="{{ asset('storage/' . $producto->images[0]) }}"
                                        alt="{{ $producto->name }}" class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('images/generico.jpeg') }}" alt="Imagen genérica"
                                        class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-xl mb-2">{{ $producto->name }}</h3>
                                <p class="text-blue-600 font-semibold text-lg">
                                    ${{ number_format($producto->price, 2, '.', ',') }}
                                </p>

                            </div>
                        </div>
                    </a>

                @empty
                    <h1 class="col-span-full text-center text-2xl font-bold text-gray-700">NO HAY PRODUCTOS
                        DISPONIBLES.
                    </h1>
                @endforelse
            </div>


            <hr class="mb-8">
            {{-- Comunicados --}}

            <header class="flex justify-between items-center mb-6">
                <div class="text-3xl font-bold text-center">
                    <h1>COMUNICADOS</h1>
                </div>
            </header>

           <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 mb-8">
                @forelse ($blogs as $blog)
                    {{-- <a href="{{ route('product.show', ['slug' => $blog->slug]) }}"> --}}
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <div class="h-48 overflow-hidden flex items-center justify-center">
                                @php
                                    $imageExists = false;
                                    $imagePath = '';
                                    if (!empty($blog->image) ) {
                                        $imagePath = $blog->image;
                                        $imageExists = Storage::disk('public')->exists($imagePath);
                                    }
                                @endphp

                                @if ($imageExists)
                                    <img src="{{ asset('storage/' . $blog->image) }}"
                                        alt="{{ $blog->title }}" class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('images/generico.jpeg') }}" alt="Imagen genérica"
                                        class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-xl mb-2">{{ $blog->title }}</h3>
                                <p class="text-blue-600 font-semibold text-lg">
                                    {{ $blog->description }}
                                </p>

                            </div>
                        </div>
                    {{-- </a> --}}

                @empty
                    <h1 class="col-span-full text-center text-2xl font-bold text-gray-700">
                        NO HAY COMUNICADOS PUBLICADOS.
                    </h1>
                @endforelse
            </div>
        </div>
    </main>
</div>
