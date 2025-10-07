<div class="container mx-auto p-4">
        <div class="flex justify-end mt-4 pb-8">
            <a href="/"
                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-8 rounded
               transition-colors duration-300 shadow-lg">
                &larr; REGRESAR
            </a>
        </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        @include('livewire.slider-imagenes-producto')

        <div class="flex flex-col gap-4">
            <h1 class="text-4xl font-bold text-center">{{ $product->name }}</h1>
            <div class="text-gray-700 text-lg">{!! $product->description !!}</div>
            <div class="text-blue-600 font-semibold text-3xl text-center mt-auto">
                ${{ number_format($product->price, 2, '.', ',') }}
            </div>
        </div>
    </div>
</div>
