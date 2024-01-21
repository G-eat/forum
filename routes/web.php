<?php

use App\Livewire\Post\Posts;
use App\Livewire\User\Posts as UserPosts;
use App\Livewire\Post\ShowPost;
use App\Livewire\User\CreatePost;
use App\Livewire\User\Profile;
use App\Livewire\User\UpdatePost;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['as' => 'post.'], function () {
    Route::get('/',                     Posts::class)->name('index');
    Route::get('/post/{id}',            ShowPost::class)->name('show');
});

Route::group(['middleware' => 'auth', 'as' => 'user.'], function () {
    Route::get('/profile',              Profile::class)->middleware(['auth'])->name('profile');
    Route::get('/dashboard',            UserPosts::class)->middleware(['auth'])->name('posts');
    Route::get('/create-post',          CreatePost::class)->middleware(['can:create-post'])->name('create-post');
    Route::get('/update-post/{post}',   UpdatePost::class)->middleware(['auth'])->name('update-post');
});


require __DIR__.'/auth.php';
