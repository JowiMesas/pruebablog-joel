<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Livewire\AllPosts;
use App\Livewire\FormPost;
use App\Livewire\Posts;
use App\Livewire\ShowPost;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/posts',Posts::class)->name('posts.index');
    Route::get('/post/form/{id?}', FormPost::class)->name('formPost');

});
Route::get('/post/{id}', ShowPost::class)->name('showPost');
Route::get('/all-posts',AllPosts::class)->name('all.posts');
require __DIR__.'/auth.php';
