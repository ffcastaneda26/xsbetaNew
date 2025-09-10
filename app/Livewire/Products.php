<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $categories;
    public $selectedCategory='all';
    public $searchQuery = '';

    // Ya no es necesario inicializar $products aquí, ya que se obtendrá en el método render.
    // public $products;

    public function mount()
    {
         $this->categories = ProductCategory::with('products')->get();
    }
    public function render()
    {
        // Se define la lógica de obtención de productos directamente en el método render
        // para que la paginación funcione correctamente.
        if ($this->selectedCategory === 'all') {
            $products = Product::with('categories')->paginate(12);
        } else if ($this->searchQuery) {
            $products = Product::where('name', 'like', '%' . $this->searchQuery . '%')->paginate(12);
        } else {
            $category = ProductCategory::with('products')->where('name', $this->selectedCategory)->first();
            $products = $category ? $category->products()->paginate(12) : collect();
        }

        return view('livewire.products', [
            'products' => $products, // Se ajusta el nombre de la variable para ser consistente con la vista
        ])->layout('layouts.principal');
    }

    public function filterByCategory($categoryId)
    {
        if ($categoryId === 'all') {
            $this->selectedCategory = 'all';
        } else {
            $category = ProductCategory::find($categoryId);
            if ($category) {
                $this->selectedCategory = $category->name;
            }
        }
        $this->resetPage(); // Reinicia la paginación a la primera página.
    }

    public function updatedSearchQuery()
    {
        $this->selectedCategory = null; // Reinicia la categoría seleccionada al buscar.
        $this->resetPage(); // Reinicia la paginación a la primera página.
    }
}
