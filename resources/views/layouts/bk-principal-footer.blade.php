    <footer class="bg-very-dark-blue py-2">
        <section
            class="mt-2 wrapper grid gap-2 grid-cols-1justify-items-center footer-area md:footer-area-md md:grid-cols-1 md:justify-items-stretch md:text-center">
            <div class="flex flex-wrap gap-2 justify-center w-full [grid-area:social-media] md:justify-start">
                <a href="3"><img src="{{ asset('images/icon-facebook.svg')}}"></a>
                <a href="3"><img src="{{ asset('images/icon-youtube.svg')}}"></a>
                <a href="3"><img src="{{ asset('images/icon-twitter.svg')}}"></a>
                <a href="3"><img src="{{ asset('images/icon-pinterest.svg')}}"></a>
                <a href="3"><img src="{{ asset('images/icon-instagram.svg')}}"></a>
            </div>
            <p class="text-white text-sm [grid-area:copy] text-end font-semibold">
                © Copyright {{ date('Y') }}
            </p>
        </section>
    </footer>
