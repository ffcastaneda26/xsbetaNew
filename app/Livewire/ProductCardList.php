<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product; // Asegúrate de importar el modelo Product

class ProductCardList extends Component
{
    // Propiedad para el título de la sección (e.g., "PROMOCIONES", "CATÁLOGO")
    public string $title;

    // Propiedad para el valor de 'destacado' (1 para promociones, 0 para normales)
    public int $destacadoValue; 

    // Opcional: Propiedad para el límite de registros, con valor por defecto
    public int $limit = 3; // Un número grande por defecto

    public function render()
    {
        // Consulta dinámica: filtra por el valor de $destacadoValue
        $items = Product::where('destacado', $this->destacadoValue)
                        ->limit($this->limit)
                        ->get();

        return view('livewire.product-card-list', [
            'items' => $items,
        ]);
    }
}