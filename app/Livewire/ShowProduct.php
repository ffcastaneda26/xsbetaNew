<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product; // Asegúrate de que este sea el modelo de tu producto
use Illuminate\Http\Request;

class ShowProduct extends Component
{
    public $product;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.show-product')->layout('layouts.principal');
    }
}
