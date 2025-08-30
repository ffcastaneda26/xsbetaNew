<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::check()) {
        if (Auth::user()->isAdmin()) {
            return redirect()->to('/admin');
        }
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
