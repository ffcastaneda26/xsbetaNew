<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog; // Asegúrate de tener e importar tu modelo Blog

class ShowBlog extends Component
{
    public $blog;

    // El método 'mount' recibe el slug directamente de la URL
    public function mount($slug)
    {

        $this->blog = Blog::where('slug', $slug)
                        ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.show-blog')
            ->layout('layouts.principal');
    }
}
