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
    public $selectedCategory = 'all';
    public $searchQuery = '';
    public $perPage = 12;
    public $showMoreCategories = false; // Propiedad para controlar la visibilidad

    public function mount()
    {
         $this->categories = ProductCategory::with('products')->get();
    }

    public function render()
    {
        $productsQuery = Product::query();

        if ($this->selectedCategory !== 'all') {
            $category = ProductCategory::where('name', $this->selectedCategory)->first();
            if ($category) {
                $productsQuery->whereHas('categories', function ($query) use ($category) {
                    $query->where('product_category_id', $category->id);
                });
            }
        }

        if ($this->searchQuery) {
            $productsQuery->where('name', 'like', '%' . $this->searchQuery . '%');
        }

        $products = $productsQuery->paginate($this->perPage);

        return view('livewire.products', [
            'products' => $products,
        ])->layout('layouts.principal');
    }

    // Nuevo método para alternar la visibilidad del menú
    public function toggleMoreCategories()
    {
        $this->showMoreCategories = !$this->showMoreCategories;
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
        $this->resetPage();
        $this->showMoreCategories = false; // Cierra el menú al seleccionar una categoría
    }

    public function updatedSearchQuery()
    {
        $this->selectedCategory = 'all';
        $this->resetPage();
    }
}
