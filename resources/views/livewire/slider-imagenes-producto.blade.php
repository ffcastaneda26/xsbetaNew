<div>
    <section class="w-[90%] mx-auto max-w-screen-lg overflow-hidden text-white rounded-lg mt-20 slider" id="slider">

        @foreach ($product->images as $image)
            @if ($image != $product->images[0])
                <figure class="relative w-full h-full aspect-video slider-childs">
                    <img src="{{ asset('storage/' . $image) }}" class="w-full h-full block object-cover">
                </figure>
            @endif
        @endforeach

        <figure class="relative w-full h-full aspect-video slider-childs" data-active>
            <img src="{{ asset('storage/' . $product->images[0]) }}" class="w-full h-full block object-cover">
        </figure>

        <button class="slider-prev bg-white rounded-full ml-4" data-button="prev">
            <img src="{{ asset('images/slider/prev.svg') }}" class="w-8 aspect-square md:w-12">
        </button>

        <button class="slider-next bg-white rounded-full mr-4" data-button="next">
            <img src="{{ asset('images/slider/next.svg') }}" class="w-8 aspect-square md:w-12">

        </button>

    </section>

    <script src="{{ asset('js/slider.js') }}"></script>
</div>
