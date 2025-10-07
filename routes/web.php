<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\AllProductsList;
use App\Livewire\BlogIndex;
use App\Livewire\ProductIndex;
use App\Livewire\Products;
use App\Livewire\ShowBlog;
use App\Livewire\ShowProduct;
use App\Livewire\Welcome;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',Welcome::class)->name('home');

Route::get('/productos/todos/{destacado?}', AllProductsList::class)
    ->name('products.index');

Route::get('/blog/{slug}', ShowBlog::class)->name('blog.show');

Route::get('/comunicados', BlogIndex::class)->name('blogs.index');

Route::get('/dashboard', function () {
    if (Auth::check()) {
        if (Auth::user()->isAdmin()) {
            return redirect()->to('/admin');
        }
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/productos', Products::class)->name('products');
Route::get('/productos/{slug}', ShowProduct::class)->name('product.show');
require __DIR__ . '/auth.php';
