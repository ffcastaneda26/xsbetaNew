                                <div class="h-60 overflow-hidden flex items-center justify-center">
                                    @php
                                        $imageExists = false;
                                        $imagePath = '';
                                        if (!empty($blog->image)) {
                                            $imagePath = $blog->image;
                                            $imageExists = Storage::disk('public')->exists($imagePath);
                                        }
                                    @endphp

                                    @if ($imageExists)
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <img src="{{ asset('images/generico.jpeg') }}" alt="Imagen genérica"
                                            class="w-full h-full object-cover">
                                    @endif
                                </div>