<div class="container mx-auto p-4">

    <header class="flex justify-between items-center mb-6">
        <div class="text-3xl font-bold text-center">
            <h1>Listado de Productos</h1>
        </div>
        <div>
            <input wire:model.live="searchQuery" type="text" placeholder="Buscar productos..."
                class="border p-2 rounded-lg">
        </div>
    </header>
    <nav class="flex justify-center items-center gap-4 mb-8">
        <a href="#" wire:click.prevent="filterByCategory('all')"
            class="p-2 border rounded-full {{ $selectedCategory == 'all' ? 'bg-blue-500 text-white' : '' }}">Todas</a>
        @foreach ($categories->take(6) as $category)
            <a href="#" wire:click.prevent="filterByCategory({{ $category->id }})"
                class="p-2 border rounded-full {{ $selectedCategory == $category->name ? 'bg-blue-500 text-white' : '' }}">
                {{ $category->name }}
            </a>
        @endforeach

        @if ($categories->count() > 6)
            <div class="relative">
                {{-- Usa wire:click para abrir/cerrar el menú --}}
                <button wire:click="toggleMoreCategories" class="p-2 border rounded-full">Más Categorías</button>

                {{-- Condición para mostrar el menú --}}
                @if ($showMoreCategories)
                    <div class="absolute bg-white border rounded-lg shadow-lg mt-2 z-10">
                        @foreach ($categories->skip(6) as $category)
                            {{-- wire:click.prevent para evitar recargas --}}
                            <a href="#" wire:click.prevent="filterByCategory({{ $category->id }})"
                                class="block p-2 hover:bg-gray-100">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif
    </nav>
    <hr class="mb-8">
    <div class="flex justify-between items-center mb-4">
        {{-- Condición para mostrar el select solo si el total de productos es mayor a 12 --}}
        @if ($products->total() > 12)
            {{-- Contenedor del select --}}
            <div class="flex items-center space-x-2">
                <label for="perPage" class="text-sm text-gray-700 font-medium">Mostrar:</label>
                <select wire:model.live="perPage" id="perPage"
                    class="border border-gray-300 rounded-md shadow-sm py-1.5 pl-3 pr-8 focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm appearance-none bg-white">
                    <option value="12">12</option>
                    <option value="24">24</option>
                    <option value="48">48</option>
                    <option value="96">96</option>
                </select>
            </div>
        @endif

        {{-- Enlaces de paginación --}}
        <div>
            {{ $products->links() }}
        </div>
    </div>
    <main class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @forelse ($products as $product)
            <a href="{{ route('product.show', ['slug' => $product->slug]) }}">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="h-48 overflow-hidden flex items-center justify-center">
                        @php
                            $imageExists = false;
                            $imagePath = '';
                            if (!empty($product->images) && is_array($product->images) && count($product->images) > 0) {
                                $imagePath = $product->images[0];
                                $imageExists = Storage::disk('public')->exists($imagePath);
                            }
                        @endphp

                        @if ($imageExists)
                            <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('images/generico.jpeg') }}" alt="Imagen genérica"
                                class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2">{{ $product->name }}</h3>
                        <p class="text-blue-600 font-semibold text-lg">
                            ${{ number_format($product->price, 2, '.', ',') }}
                        </p>
                        <p class="text-blue-600 font-semibold text-lg">
                            ID: {{ $product->id }} Total de imagenes: {{ count($product->images) }}
                        </p>
                    </div>
                </div>
            </a>

        @empty
            <h1 class="col-span-full text-center text-2xl font-bold text-gray-700">NO HAY PRODUCTOS DISPONIBLES.</h1>
        @endforelse
    </main>

    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
