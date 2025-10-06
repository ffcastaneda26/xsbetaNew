<?php
namespace App\Livewire;

use App\Models\Blog;
use App\Models\Product;
use Livewire\Component;

class Welcome extends Component
{

    /**
     * Renderiza la vista del componente.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        // $promociones = Product::where('destacado', 1)->inRandomOrder()->limit(3)->get();
        // $productos   = Product::where('destacado', 0)->inRandomOrder()->limit(3)->get();
        $blogs       = Blog::where('is_published', 1)->inRandomOrder()->limit(3)->get();
        return view('livewire.welcome', [
            'blogs'       => $blogs,
        ])->layout('layouts.principal');
    }
}
