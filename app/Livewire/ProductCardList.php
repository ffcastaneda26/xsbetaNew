<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product; // Asegúrate de importar el modelo Product

class ProductCardList extends Component
{
    public string $title;

    public int $destacadoValue;

    public int $limit = 5; // Un número grande por defecto

    public function render()
    {
        $items = Product::where('destacado', $this->destacadoValue)
                        ->limit($this->limit)
                        ->inRandomOrder()
                        ->get();

        return view('livewire.product-card-list', [
            'items' => $items,
        ]);
    }
}
