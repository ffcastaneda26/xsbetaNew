<?php
namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;

    public $isPublished = null;

    public $search = '';
    public $title = "COMUNICADOS";

    /**
     * Monta el componente recibiendo el parámetro de publicación.
     *
     * @param int|null $isPublished
     * @return void
     */
    public function mount($isPublished = null)
    {
        if (in_array($isPublished, [0, 1])) {
            $this->isPublished = $isPublished;
        } else {
            $this->isPublished = 1; 
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    /**
     * Renderiza la vista del componente con la lista paginada de blogs.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $query = Blog::query();

        if (!empty($this->search)) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        $blogs = $query->latest('published_at')->paginate(6);

        return view('livewire.blog-index', [
            'blogs' => $blogs,
        ])->layout('layouts.principal');
    }
}