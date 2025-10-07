<div class="container mx-auto p-4">
    <a href="{{ route('products') }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-full mb-6">
        &larr; Volver a Productos
    </a>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        @include('livewire.slider-imagenes-producto')

        <div class="flex flex-col gap-4">
            <h1 class="text-4xl font-bold text-center">{{ $product->name }}</h1>
            <div class="text-gray-700 text-lg">{!! $product->description !!}</div>
            <p class="text-blue-600 font-semibold text-3xl text-center mt-auto">
                ${{ number_format($product->price, 2, '.', ',') }}
            </p>
        </div>
    </div>
</div>
