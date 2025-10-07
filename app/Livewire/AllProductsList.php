<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class AllProductsList extends Component
{
    use WithPagination;

    public $destacado;
    public string $title;

    // 1. NUEVA PROPIEDAD: Para guardar el término de búsqueda
    public string $search = '';

    // Opcional: Para resetear la paginación al cambiar el filtro o la búsqueda
    // Mantenemos 'destacado' y añadimos 'search'
    protected $queryString = ['destacado', 'search'];

    // HOOK para resetear la paginación al cambiar el término de búsqueda
    // El método se llama automáticamente cada vez que se actualiza $search
    public function updatedSearch()
    {
        // 2. NUEVO MÉTODO: Reinicia la paginación a la página 1
        $this->resetPage(); //
    }

    public function mount($destacado = null)
    {
        $this->destacado = $destacado;
        // La lógica para $this->title se mantiene igual...
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

        // Aplicar el filtro 'destacado'
        if (in_array($this->destacado, [0, 1])) {
            $query->where('destacado', $this->destacado);
        }

        // 3. NUEVA LÓGICA DE BÚSQUEDA: Si hay un término de búsqueda, aplicamos el filtro
        if (!empty($this->search)) {
            $searchTerm = '%' . $this->search . '%';

            // Usamos un grupo de clausulas WHERE para buscar en múltiples campos (name Y description)
            $query->where(function (Builder $q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                  ->orWhere('description', 'like', $searchTerm);
            });
        }

        // Paginar los resultados, por ejemplo, 12 por página.
        $items = $query->paginate(12);

        return view('livewire.all-products-list', [
            'items' => $items,
        ])->layout('layouts.principal');
    }
}
