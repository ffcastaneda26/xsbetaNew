{{-- <div class="container mx-auto p-4">
    <div class="flex justify-end mb-8">
        <a href="{{ route('home') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-8 rounded
               transition-colors duration-300 shadow-lg">
            &larr; REGRESAR
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-xl p-8">

        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $blog->title }}</h1>

        <p class="text-sm text-gray-500 mb-6">
            Publicado el {{ $blog->published_at->format('d/m/Y') }}
        </p>

        @include('livewire.imagen-blog')

        <div class="prose max-w-none">
            {!! $blog->content !!}
        </div>
    </div>

    <div class="flex justify-end mt-8">
        <a href="{{ route('home') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-8 rounded
               transition-colors duration-300 shadow-lg">
            &larr; REGRESAR
        </a>
    </div>
</div> --}}
<div class="container mx-auto p-4">
    <div class="flex justify-end mt-4 pb-8">
        <a href="/"
            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-8 rounded
               transition-colors duration-300 shadow-lg">
            &larr; REGRESAR
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        @include('livewire.imagen-blog')


        <div class="flex flex-col gap-4">
            <h1 class="text-4xl font-bold text-center">{{ $blog->title }}</h1>
            <div class="text-gray-700 text-lg">{!! $blog->description !!}</div>
            <div class="text-gray-700 text-lg">{!! $blog->content !!}</div>
        </div>
    </div>
</div>
