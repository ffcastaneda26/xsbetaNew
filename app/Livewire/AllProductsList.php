<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product; // Asegúrate de importar tu modelo
use Illuminate\Database\Eloquent\Builder;

class AllProductsList extends Component
{
    public  $destacado;

    public string $title;

    // Se ejecuta al montar el componente con el parámetro de la ruta
    public function mount($destacado = null)
    {
        $this->destacado = $destacado;

        if ($this->destacado == 1) {
            $this->title = 'TODOS LOS ARTÍCULOS EN PROMOCIÓN';
        } elseif ($this->destacado == 0) {
            $this->title = 'TODOS LOS ARTÍCULOS SIN PROMOCIÓN';
        } else {
            $this->title = 'TODOS LOS ARTÍCULOS';
        }
    }

    public function render()
    {
        $query = Product::query();

        // Aplicar el filtro 'destacado' solo si se ha pasado un valor válido
        if (in_array($this->destacado, [0, 1])) {
            $query->where('destacado', $this->destacado);
        }
        // Nota: No se aplica 'limit' ni 'inRandomOrder' aquí, queremos *todos*.

        $items = $query->get();

        return view('livewire.all-products-list', [
            'items' => $items,
        ])->layout('layouts.principal');
    }
}
